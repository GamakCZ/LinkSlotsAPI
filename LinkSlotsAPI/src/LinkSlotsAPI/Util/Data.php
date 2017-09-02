<?php

namespace LinkSlotsAPI\Util;

use LinkSlotsAPI\LinkSlotsAPI;
use LinkSlotsAPI\Task\RefreshDataTask;

/**
 * Class Data
 * @package LinkSlotsAPI\Util
 * @author GamakCZ
 */
class Data {

    /** @var LinkSlotsAPI $plugin */
    public $plugin;

    /** @var RefreshDataTask $refreshDataTask */
    public $refreshDataTask;

    /** @var string $ip */
    public $ip;

    /** @var int $port */
    public $port;

    /** @var  int $players */
    public $players;

    /**
     * Data constructor.
     * @param LinkSlotsAPI $plugin
     * @param string $ip
     * @param int $port
     */
    public function __construct(LinkSlotsAPI $plugin, string $ip, int $port) {
        $this->plugin = $plugin;
        $this->ip = $ip;
        $this->port = $port;
        $this->plugin->getServer()->getScheduler()->scheduleRepeatingTask($this->refreshDataTask = new RefreshDataTask($this), 20*10);
    }

    public function refresh() {
        $webAPI = LinkSlotsAPI::WEB_API;
        $webAPI = str_replace("%adress", $this->ip, $webAPI);
        $webAPI = str_replace("%port", $this->port, $webAPI);
        $file = file_get_contents($webAPI);
        $data = json_decode($file);
        $this->players = $data["players"]["online"];
    }

    /**
     * @return int $players
     *
     * (count)
     */
    public function getPlayers():int {
        return $this->players;
    }

}