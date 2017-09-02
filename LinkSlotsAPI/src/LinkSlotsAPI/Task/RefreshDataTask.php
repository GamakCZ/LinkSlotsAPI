<?php

namespace LinkSlotsAPI\Task;

use LinkSlotsAPI\Util\Data;
use pocketmine\scheduler\Task;

/**
 * Class RefreshDataTask
 * @package LinkSlotsAPI\Task
 * @author GamakCZ
 */
class RefreshDataTask extends Task {

    /** @var  Data $plugin */
    public $plugin;

    /**
     * RefreshDataTask constructor.
     * @param Data $plugin
     */
    public function __construct(Data $plugin) {
        $this->plugin = $plugin;
    }

    /**
     * @param int $currentTick
     */
    public function onRun(int $currentTick) {
        $this->plugin->refresh();
        $this->plugin->plugin->getLogger()->debug("§aRefreshed!");
    }
}