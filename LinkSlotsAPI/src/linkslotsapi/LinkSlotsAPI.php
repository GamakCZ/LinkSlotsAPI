<?php

declare(strict_types = 1);

namespace linkslotsapi;

use pocketmine\plugin\PluginBase;

/**
 * Class LinkSlotsAPI
 * @package linkslotsapi
 * @author VixikCZ
 */
class LinkSlotsAPI extends PluginBase {
  
  public function onEnable() {
    $this->startTask();
  }
  
  private function startTask() {
    $this->getServer()->getScheduler()->scheduleRepeatingTask(new class extends \pocketmine\scheduler\Task {
      public function onRun(int $currentTick) {
        \pocketmine\Server::getInstance()->getScheduler()->scheduleAsyncTask(new \linkslotsapi\task\RefreshDataTask());
      }
    }, 20*10);
  }
}
