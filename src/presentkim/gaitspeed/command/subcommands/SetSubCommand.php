<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use presentkim\gaitspeed\{
  GaitSpeedMain as Plugin, util\Translation, command\SubCommand
};
use function presentkim\gaitspeed\util\toInt;

class SetSubCommand extends SubCommand{

    public function __construct(Plugin $owner){
        parent::__construct($owner, Translation::translate('prefix'), 'command-gaitspeed-set', 'gaitspeed.set.cmd');
    }

    /**
     * @param CommandSender $sender
     * @param array         $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args){
        if (isset($args[1])) {
            $playerName = strtolower($args[0]);
            $player = Server::getInstance()->getPlayerExact($playerName);
            $configData = $this->owner->getConfig()->getAll();
            $playerData = $configData['playerData'];
            $exists = isset($playerData[$playerName]);
            if ($player === null && !$exists) {
                $sender->sendMessage($this->prefix . Translation::translate('command-generic-failure@invalid-player', $args[0]));
            } else {
                $speed = toInt($args[1], null, function (int $i){
                    return $i >= 0;
                });
                if ($speed === null) {
                    $sender->sendMessage($this->prefix . Translation::translate('command-generic-failure@invalid', $args[1]));
                } else {
                    if ($speed == ((int) $configData['default-speed'])) {
                        if ($exists) {
                            unset($playerData[$playerName]);
                            $this->owner->getConfig()->set('playerData', $playerData);
                            $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success-default'), $playerName));
                        } else {
                            $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('failure-default'), $args[0]));
                        }
                    } else {
                        $playerData[$playerName] = $speed;
                        $this->owner->getConfig()->set('playerData', $playerData);
                        $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success-set'), $playerName, $speed));
                    }
                    if (!$player == null) {
                        $this->owner->applyTo($player);
                    }
                }
            }
            return true;
        }
        return false;
    }
}