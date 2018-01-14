<?php
/*
*
* Copyright (C) 2017 Muqsit Rayyan
*
*    ___ _                                        _ _       
*   / _ \ | __ _ _   _  ___ _ __/\   /\__ _ _   _| | |_ ___ 
*  / /_)/ |/ _" | | | |/ _ \ "__\ \ / / _" | | | | | __/ __|
* / ___/| | (_| | |_| |  __/ |   \ V / (_| | |_| | | |_\__ \
* \/    |_|\__,_|\__, |\___|_|    \_/ \__,_|\__,_|_|\__|___/
*                |___/                                      
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
*
* @author Muqsit Rayyan
* Twiter: http://twitter.com/muqsitrayyan
* GitHub: http://github.com/Muqsit
*
*/
namespace PlayerVaults\Vault;

use PlayerVaults\PlayerVaults;

use pocketmine\inventory\{ChestInventory, InventoryType};
use pocketmine\Player;

class VaultInventory extends ChestInventory {

    public function onClose(Player $who) : void
    {
        $holder = $this->getHolder();

        if(isset($holder->namedtag->Vault)){
            PlayerVaults::getInstance()->getData()->saveContents($holder, $this->getContents());
        }

        $holder->sendReplacement($who);
        $holder->close();
    }
}
