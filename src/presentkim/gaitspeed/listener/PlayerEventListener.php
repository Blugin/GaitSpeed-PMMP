<?php

namespace presentkim\gaitspeed\listener;

use pocketmine\entity\Attribute;
use pocketmine\event\{
  Listener, player\PlayerJoinEvent, player\PlayerRespawnEvent
};
use pocketmine\Player;
use presentkim\gaitspeed\GaitSpeedMain as Plugin;

class PlayerEventListener implements Listener{

    /** @var Plugin */
    private $owner = null;

    public function __construct(){
        $this->owner = Plugin::getInstance();
    }

    /** @param PlayerJoinEvent $event */
    public function onPlayerJoinEvent(PlayerJoinEvent $event) : void{
        $this->owner->applyTo($event->getPlayer());
    }

    /** @param PlayerRespawnEvent $event */
    public function onPlayerRespawnEvent(PlayerRespawnEvent $event) : void{
        $this->owner->applyTo($event->getPlayer());
    }
}