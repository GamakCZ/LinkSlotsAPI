<?php

declare(strict_types=1);

namespace linkslotsapi\utils;

/**
 * Class Server
 * @package linkslotsapi\utils
 * @author VixikCZ
 */
class Server {

    /** @var string $adress */
    private $adress = "";

    /** @var int $port */
    private $port = 19132;

    /** @var bool $online */
    private $online = false;

    /** @var int $onlinePlayers */
    private $onlinePlayers = 0;

    /** @var int $slots */
    private $slots = 0;

    /**
     * Server constructor.
     * @param string $adress
     * @param int $port
     */
    public function __construct(string $adress, int $port) {
        $this->adress = $adress;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getAdress() {
        return $this->adress;
    }

    /**
     * @return int
     */
    public function getPort() {
        return $this->port;
    }

    /**
     * @return int
     */
    public function getSlots(): int {
        return $this->slots;
    }

    /**
     * @return int
     */
    public function getOnlinePlayers(): int {
        return $this->onlinePlayers;
    }

    /**
     * @param int $slots
     */
    public function setSlots(int $slots) {
        $this->slots = $slots;
    }

    /**
     * @param int $players
     */
    public function setOnlinePlayers(int $players) {
        $this->onlinePlayers = $players;
    }
}