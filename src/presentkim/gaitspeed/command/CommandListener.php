<?php

namespace presentkim\gaitspeed\command\subcommands;

namespace presentkim\gaitspeed\command;

use pocketmine\command\{
  Command, CommandExecutor, CommandSender
};
use presentkim\gaitspeed\GaitSpeedMain as Plugin;
use presentkim\gaitspeed\command\subcommands\{
  DefaultSubCommand, SetSubCommand, ListSubCommand, LangSubCommand, ReloadSubCommand, SaveSubCommand
};

class CommandListener implements CommandExecutor{

    /** @var Plugin */
    protected $owner;

    /**
     * SubComamnd[] $subcommands
     */
    protected $subcommands = [];

    /** @param Plugin $owner */
    public function __construct(Plugin $owner){
        $this->owner = $owner;

        $this->subcommands = [
          new DefaultSubCommand($this->owner),
          new SetSubCommand($this->owner),
          new ListSubCommand($this->owner),
          new LangSubCommand($this->owner),
          new ReloadSubCommand($this->owner),
          new SaveSubCommand($this->owner),
        ];
    }

    /**
     * @param CommandSender $sender
     * @param Command       $command
     * @param string        $label
     * @param string[]      $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if (!isset($args[0])) {
            return false;
        } else {
            $label = array_shift($args);
            foreach ($this->subcommands as $key => $value) {
                if ($value->checkLabel($label)) {
                    $value->execute($sender, $args);
                    return true;
                }
            }
            return false;
        }
    }
}