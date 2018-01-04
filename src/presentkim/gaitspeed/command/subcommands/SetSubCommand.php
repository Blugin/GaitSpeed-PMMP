<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use presentkim\gaitspeed\{
  GaitSpeedMain as Plugin, util\Translation, command\SubCommand
};
use function presentkim\gaitspeed\util\toInt;
use function strtolower;

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
    public function onCommand(CommandSender $sender, array $args) : bool{
        if (isset($args[1])) {
            $playerName = strtolower($args[0]);
            $player = Server::getInstance()->getPlayerExact($playerName);
            $result = $this->owner->query("SELECT gait_speed FROM gait_speed_list WHERE player_name = $playerName;")->fetchArray(SQLITE3_NUM)[0];
            if (!$player == null && $result === false) {
                $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('failure'), $args[0]));
            } else {
                if (($speed = toInt($args[1])) !== null) {
                    if ($speed == ((int) $this->owner->getConfig()->get("default-speed"))) { // Are you set to default speed? I will remove data
                        $this->owner->query("DELETE FROM gait_speed_list WHERE player_name = $playerName");
                        $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success-default'), $playerName));
                    } else {
                        if ($result === false) { // When first query result is not exists
                            $this->owner->query("INSERT INTO gait_speed_list VALUES ($playerName, $speed);");
                        } else {
                            $this->owner->query("
                            UPDATE gait_speed_list
                                set gait_speed = $speed
                            WHERE player_name = $playerName;
                        ");
                        }
                        $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success-set'), $playerName, $speed));
                    }
                    return true;
                }
            }
        }
        return false;
    }
}