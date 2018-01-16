<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use presentkim\gaitspeed\{
  command\PoolCommand, GaitSpeedMain as Plugin, command\SubCommand
};

class SaveSubCommand extends SubCommand{

    public function __construct(PoolCommand $owner){
        parent::__construct($owner, 'save');
    }

    /**
     * @param CommandSender $sender
     * @param String[]      $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args){
        $this->plugin->save();
        $sender->sendMessage(Plugin::$prefix . $this->translate('success'));

        return true;
    }
}