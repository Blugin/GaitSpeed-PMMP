<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use presentkim\gaitspeed\{
  GaitSpeedMain as Plugin, util\Translation, command\SubCommand
};
use function presentkim\gaitspeed\util\toInt;

class DefaultSubCommand extends SubCommand{

    public function __construct(Plugin $owner){
        parent::__construct($owner, Translation::translate('prefix'), 'command-gaitspeed-default', 'gaitspeed.default.cmd');
    }

    /**
     * @param CommandSender $sender
     * @param array         $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args){
        if (isset($args[0])) {
            $default = toInt($args[0], null, function (int $i){
                return $i >= 0;
            });
            if ($default === null) {
                $sender->sendMessage($this->prefix . Translation::translate('command-generic-failure@invalid', $args[0]));
            } else {
                $this->owner->getConfig()->set("default-speed", $default);
                $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success'), $default));
            }
            return true;
        }
        return false;
    }
}