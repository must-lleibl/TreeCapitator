<?php

/*
__PocketMine Plugin__
name=TreeCapitator
description=Break trees faster breaking the lowest trunk
version=getting started p2
author=must with PEMapModder^s help
class=TreeCap
apiversion=12,13
*/

/*
Here is the progress record:
-p1//getting started\\
-p2//default comands\\
*/


class TreeCapPlugin implements Plugin{
  private $api, $path, $config, $id, $equip;
	public function __construct(ServerAPI $api, $server=0){}
	
	public function __destruct(){}
	
	public function init(){
    $server=ServerAPI::request();
    $this->api->addHandler("player.block.break", array($this, "handle"), 2);
    $this->treecapitator =new Config($this->api->plugin->configPath($this)."treecapitator.yml", CONFIG_YAML, array());
    $this->api->console->register("treebrk on|off", "enable\disable all players to brake trees (fastly)", array($this, "command"));
    $this->api->console->register("treebrk (@player) on|off", "to get permission\or to disable current player brake trees fastly", array($this, "command"));
    console(FORMAT_GREEN."["TreeCapitator is loaded"]");
}
}
