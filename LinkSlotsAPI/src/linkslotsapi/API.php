<?php

declare(strict_types=1);

namespace linkslotsapi;

use linkslotsapi\utils\Server;

/**
 * Class API
 * @package linkslotsapi
 * @author VixikCZ
 */
class API {

    /** @var Server[] $servers */
    public static $servers = [];

    /**
     * @param string $adress
     * @param int $port
     * @return Server
     */
    public static function addServer(string $adress, int $port = 19132): Server {
        return self::$servers[strval($adress.$port)] = new Server($adress, 19132);
    }

    /**
     * @param string $adress
     * @param int $port
     * @return Server
     */
    public static function getServer(string $adress, int $port = 19132): Server {
        return isset(self::$servers[strval($adress.$port)]) ? self::$servers[strval($adress.$port)] : self::addServer($adress, $port);
    }

    /**
     * @param string $adress
     * @param int $port
     */
    public static function removeServer(string $adress, int $port = 19132) {
        unset(self::$servers[strval($adress.$port)]);
    }
}