<?php

namespace presentkim\gaitspeed\command\subcommands;

use pocketmine\command\CommandSender;
use pocketmine\Server;
use presentkim\gaitspeed\{
  GaitSpeedMain as Plugin, util\Translation, command\SubCommand
};
use function presentkim\gaitspeed\util\toInt;

class ListSubCommand extends SubCommand{

    public function __construct(Plugin $owner){
        parent::__construct($owner, Translation::translate('prefix'), 'command-gaitspeed-list', 'gaitspeed.list.cmd');
    }

    /**
     * @param CommandSender $sender
     * @param array         $args
     *
     * @return bool
     */
    public function onCommand(CommandSender $sender, array $args){
        $list = [];
        foreach ($this->owner->getConfig()->get('playerData') as $key => $value) {
            if (($player = Server::getInstance()->getPlayerExact($key)) !== null) {
                $key = $player->getName();
            }
            $list[] = [$key, $value];
        }

        $max = ceil(sizeof($list) / 5);
        $page = min($max, (isset($args[0]) ? toInt($args[0], 1, function (int $i){
              return $i > 0 ? 1 : -1;
          }) : 1) - 1);
        $message = Translation::translate($this->getFullId('head'), $page + 1, $max);
        for ($i = $page * 5; $i < ($page + 1) * 5 && $i < count($list); $i++) {
            $message .= PHP_EOL . Translation::translate($this->getFullId('item'), ...$list[$i]);
        }
        $sender->sendMessage("$this->prefix$message");

        return true;
    }
}