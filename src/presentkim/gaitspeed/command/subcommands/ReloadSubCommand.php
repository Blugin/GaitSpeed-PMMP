<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use presentkim\gaitspeed\{
  GaitSpeedMain as Plugin, util\Translation, command\SubCommand
};

class ReloadSubCommand extends SubCommand{

    public function __construct(Plugin $owner){
        parent::__construct($owner, Translation::translate('prefix'), 'command-gaitspeed-reload', 'gaitspeed.reload.cmd');
    }

    /**
     * @param CommandSender $sender
     * @param array         $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args){
        $this->owner->load();
        $sender->sendMessage($this->prefix . Translation::translate($this->getFullId('success')));

        return true;
    }
}