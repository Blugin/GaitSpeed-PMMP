<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use presentkim\gaitspeed\{
  command\PoolCommand, GaitSpeed as Plugin, util\Translation, command\SubCommand, util\Utils
};

class DefaultSubCommand extends SubCommand{

    public function __construct(PoolCommand $owner){
        parent::__construct($owner, 'default');
    }

    /**
     * @param CommandSender $sender
     * @param String[]      $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args) : bool{
        if (isset($args[0])) {
            $default = Utils::toInt($args[0], null, function (int $i){
                return $i >= 0;
            });
            if ($default === null) {
                $sender->sendMessage(Plugin::$prefix . Translation::translate('command-generic-failure@invalid', $args[0]));
            } else {
                $this->plugin->getConfig()->set('default-speed', $default);
                $sender->sendMessage(Plugin::$prefix . $this->translate('success', $default));
            }
            return true;
        }
        return false;
    }
}