# LinkSlotsAPI

[![Poggit-CI](https://poggit.pmmp.io/ci.shield/GamakCZ/LinkSlotsAPI/LinkSlotsAPI)](https://poggit.pmmp.io/ci/GamakCZ/LinkSlotsAPI/LinkSlotsAPI)



### Register a server

```php
$server = \linkslotsapi\API::addServer(int $adress, int $port);
```

### Get registered server

```php
$server = \linkslotsapi\API::getServer(int $adress, int $port)
```

### Simple code:

```php
class MyPlugin extends PluginBase {

    public function onEnable() {
        \linkslotsapi\API::addServer($adress, $port);
        $this->startTask();
    }
    
    private function startTask() {
        $this->getServer()->getScheduler()->scheduleRepeatingTask(new class extends Task {
            public function onRun(int $currentTick) {
                $server = \linkslotsapi\API::getServer($adress, $port);
                MyPlugin::updateSlots($server->getOnlinePlayers(), $server->getSlots());
            }
        });
    }
    
    /**
     * @var int $playerCount
     * @var int $slots
     */
    public static function updateSlots(int $playerCount, int $slots) {
        \pocketmine\Server::getInstance()->getQueryInformation()->setPlayersCount($playerCount);
        \pocketmine\Server::getInstance()->getQueryInformation()->setMaxPlayerCount($slots);
    }
}
```