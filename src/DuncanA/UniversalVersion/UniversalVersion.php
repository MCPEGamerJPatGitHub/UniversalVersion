<?php

namespace \DuncanA\UniversalVersion;

use pocketmine\plugin\PluginBase; //Always use backslashes for imports
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\protocol\Info as ProtocolInfo; //Needed for ProtocolInfo::
use pocketmine\network\protocol\DataPacket; //Needed for DataPacket
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class UniversalVersion extends PLuginBase {
   
   public function onEnable () {
      $this->getLogger()->info("onEnable() as UniversalVersion");
      
      foreach(Server::getInstance()->getOnlinePlayers() as $player){
    $this->playerList[$player->getName()] = $this->getPlayerData($player);
}

      foreach(Server::getInstance()->getPlayerVersion() as $player){
    $this->versionList[$player->getVersion()] = $this->getVersionData($version);
}

   $this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->info(TextFormat::GREEN . "OutDated 1.0 Enabled!");
                }
   }
   
   public function onDisable () {
      $this->getLogger()->info("onDisable() as UniversalVersion");
   }
   
   public function onCommand(CommandSender $sender, Command $command, $commandLabel, array $args){
}

   public function onVersion(PlayerCommandPreProcessEvent $event){
$msg = $event->getMessage();
if(msg[0] == "/" && msg[1] == "s" && msg[2] == "a" && msg[3] == "y"){
// Do something
$event-setCancelled(true); //Doesn't do the old command
}
}

   public function onDPRPacket(DataPacketReceiveEvent $ev){
        $p = $ev->getPlayer();
        if(($pk = $ev->getPacket()) instanceof DataPacket){
            switch($pk->pid()){
                case ProtocolInfo::LOGIN_PACKET;
                    if($pk->protocol1 === ProtocolInfo::CURRENT_PROTOCOL){
                        return;
                    }
                    if($pk->protocol1 > ProtocolInfo::CURRENT_PROTOCOL){
                        $p->kick("UniversalVersion is currently not working");
                        $ev->setCancelled(true);
                    }else{
                        $p->kick("UniversalVersion is currently not working :(");
                        $ev->setCancelled(true);
                    }
                break;
             
                default:
             
                break;
            }
        }
    }
}
