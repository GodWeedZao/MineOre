<?php

declare(strict_types=1);

namespace GodWeedZao\MineOre;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public $oreList = [16, 56, 129, 21, 14, 15, 73];

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->notice("Plugin Enabling...");
    }

    public function MineOre(BlockBreakEvent $event) {
        if ((!$event->getPlayer()->isOp()) && (!in_array($event->getBlock()->getId(), $this->oreList))) {
            $event->setCancelled(true);
        }
    }
}
