<?php

namespace linkslotsapi\task;

use linkslotsapi\API;
use pocketmine\scheduler\AsyncTask;

/**
 * Class RefreshDataTask
 * @package LinkSlotsAPI\task
 * @author VixikCZ
 */
class RefreshDataTask extends AsyncTask {


    public function onCompletion(\pocketmine\Server $server) {
        foreach (API::$servers as $adress => $servers) {
            $json = json_decode(file_get_contents("https://use.gameapis.net/mcpe/query/players/".$servers->getAdress().":".$servers->getPort(), false, stream_context_create(["ssl" => ["verify_peer" => false, "verify_peer_name" => false]])));
            $status = false;
            $onlinePlayers = 0;
            $slots = 0;
            if($json->players !== null && boolval($json->status)) {
                $status = true;
            }
            if($status === true) {
                foreach ($json->players as $i => $d) {
                    if($i == "online") $onlinePlayers = $d;
                    if($i == "max") $slots = $d;
                }
            }
            $servers->setOnlinePlayers($onlinePlayers);
            $servers->setSlots($slots);
        }
    }

    public function onRun() {
        $this->setResult("text");
    }
}
