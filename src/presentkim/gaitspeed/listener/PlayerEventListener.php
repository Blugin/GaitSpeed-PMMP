<?php

namespace presentkim\gaitspeed\listener;

use pocketmine\event\Listener;
use pocketmine\event\player\{
  PlayerJoinEvent, PlayerMoveEvent, PlayerRespawnEvent
};
use presentkim\gaitspeed\GaitSpeed as Plugin;

class PlayerEventListener implements Listener{

    /** @var Plugin */
    private $owner = null;

    /**
     * Array for apply speed after PlayerRespawnEvent
     * Because PMMP remove effect after PlayerRespawnEvent called....
     *
     * @var array array[string => true]
     */
    private $apply = [];

    public function __construct(){
        $this->owner = Plugin::getInstance();
    }

    /** @param PlayerJoinEvent $event */
    public function onPlayerJoinEvent(PlayerJoinEvent $event) : void{
        $this->owner->applyTo($event->getPlayer());
    }

    /** @param PlayerRespawnEvent $event */
    public function onPlayerRespawnEvent(PlayerRespawnEvent $event) : void{
        $this->apply[$event->getPlayer()->getName()] = true;
    }

    /** @param PlayerMoveEvent $event */
    public function onPlayerMoveEvent(PlayerMoveEvent $event) : void{
        $player = $event->getPlayer();
        $playerName = $player->getName();
        if (isset($this->apply[$playerName])) {
            $this->owner->applyTo($player);
            unset($this->apply[$playerName]);
        }
    }
}