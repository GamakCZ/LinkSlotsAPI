<?php

namespace LinkSlotsAPI;

use LinkSlotsAPI\Util\Data;
use pocketmine\plugin\PluginBase;

/**
 * Class LinkSlotsAPI
 * @package LinkSlotsAPI
 * @author GamakCZ
 */
class LinkSlotsAPI extends PluginBase {

    const WEB_API = "http://use.gameapis.net/mcpe/query/players/%adress:%port.json";

    /** @var  LinkSlotsAPI $instance */
    static $instance;

    /** @var  Data[] $data */
    public $data;

    public function onEnable() {
        self::$instance = $this;
        $this->getLogger()->debug("LinkSlotsAPI enabled.");
    }

    /**
     * @return LinkSlotsAPI $instance
     */
    public static function getInstance() {
        return self::$instance;
    }

    /**
     * @param string $adress
     * @param int $port
     * @return int
     */
    public function getPlayers(string $adress, int $port):int {
        $fullIp = strval($adress.":".$port);
        var_dump($this->data);
        if(isset($this->data[$fullIp])) {
            return $this->data[$fullIp]->getPlayers();
        }
        else {
            $this->data[$fullIp] = new Data($this, $adress, $port);
            return $this->data[$fullIp]->getPlayers();
        }
    }
}