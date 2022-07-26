<?php

declare(strict_types=1);

namespace Estem0;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class NightPVP extends PluginBase implements Listener{
  
    public function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onEntityDamageByEntity(EntityDamageEvent $event){

	      if($event->getEntity->getWorld()->getConfig() instanceof Player && $event){
      		$NPWorld = getPlayer()->getWorld()->getFolderName();
		      $ANPWorld = (array)$this->getConfig()->get("worlds");
	      }
        if($event instanceof EntityDamageByEntityEvent){          
            if(!$this->isNight($event->getEntity()->getWorld()->getTime())){
                if($event->getEntity() instanceof Player && $event->getDamager() instanceof Player){                  
                    if(!$event->getDamager()->hasPermission("nightpvp.exempt.victim") && !$event->getDamager()->hasPermission("nightpvp.exempt.damager")){
                        $this->$event->cancel();
                    }
                    
                }
                
            }
            
        }
        
    }
    
    public function isNight($t){
      
      $player = instanceof Player;
      
		$NPWorld = $player->getWorld()->getFolderName();
		$ANPWorld = (array)$this->getConfig()->get("worlds");
		if (!$event->in_array($NPWorld, $ANPWorld)) return;
		$this->$event->cancel();
        return ($t >= 10900 && $t < 17800);
    }
}
