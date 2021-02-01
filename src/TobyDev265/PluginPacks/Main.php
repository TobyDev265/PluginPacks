<?php

namespace TobyDev265\PluginPacks;

use pocketmine\{Server, Player};
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender, ConsoleCommandSender};
use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        if($cmd->getName() == "pluginpacks") {
            if(!$sender instanceof Player) {
                if(empty($args[0]) || $args == null) {
                    $this->unknownCmd($sender);
                } else {
                switch($args[0]) {
                    case "list":
                        $sender->sendMessage(C::GREEN . "Available packs:\n" . C::YELLOW . "<1> Prison\n" . C::YELLOW . "<2> Skyblock\n" . C::YELLOW . "<3> SkyWars\n" . C::YELLOW . "<4> BedWars");
                        break;
                    case "install":
                        switch($args[1]) {
                            case 1:
                                // Prison
                                // Include: Prisons, PurePerms, PureChat, EconomyAPI, MineReset, ScoreHud
                                $plugin = ["Prisons", "PurePerms", "PureChat", "EconomyAPI", "MineReset", "ScoreHud"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "install " . $p);
                                }
                                break;
                            case 2:
                                // Skyblock
                                // Include: MultiWorld, SkyBlock, EconomyAPI, FormAPI, CustomShopUI, ScoreHud, EC-TableUI
                                $plugin = ["MultiWorld", "SkyBlock", "FormAPI", "EconomyAPI", "CustomShopUI", "ScoreHud", "EC-TableUI"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "install " . $p);
                                }
                                break;
                                case 3:
                                    $plugin = ["MultiWorld", "BuilderTools", "FormAPI", "BedWars"];
                                    foreach($plugin as $p) {
                                        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "install " . $p);
                                    }
                                    break;
                                case 4:
                                    $plugin = ["MultiWorld", "BuilderTools", "FormAPI", "SkyWars"];
                                    foreach($plugin as $p) {
                                        $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "install " . $p);
                                    }
                                    break;
                            default:
                                $sender->sendMessage(C::RED . "Cannot find plugin pack!");
                                break;
                        }
                        break;
                    case "remove":
                        switch($args[1]) {
                            case 1:
                                // Prison
                                // Include: Prisons, PurePerms, PureChat, EconomyAPI, MineReset, ScoreHud
                                $plugin = ["Prisons", "PurePerms", "PureChat", "EconomyAPI", "MineReset", "ScoreHud"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "uninstall " . $p);
                                }
                                break;
                            case 2:
                                // Skyblock
                                // Include: MultiWorld, SkyBlock, EconomyAPI, FormAPI, CustomShopUI, ScoreHud, EC-TableUI
                                $plugin = ["MultiWorld", "SkyBlock", "FormAPI", "EconomyAPI", "CustomShopUI", "ScoreHud", "EC-TableUI"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "uninstall " . $p);
                                }
                                break;
                            case 3:
                                $plugin = ["MultiWorld", "BuilderTools", "FormAPI", "BedWars"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "uninstall " . $p);
                                }
                                break;
                            case 4:
                                $plugin = ["MultiWorld", "BuilderTools", "FormAPI", "SkyWars"];
                                foreach($plugin as $p) {
                                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "uninstall " . $p);
                                }
                                break;
                            default:
                                $sender->sendMessage(C::RED . "Cannot find plugin pack!");
                                break;
                        }
                        break;
                    case "help":
                        $sender->sendMessage("Usage:\n pluginpacks install <pack> to install pack\n pluinpacks remove <pack> to remove pack\n pluginpacks list to see available packs");
                        break;
                    default:
                        $this->unknownCmd($sender);
                        break;
                }
            }
            }
        }
        return true;
    }
    public function unknownCmd($sender) {
        $sender->sendMessage(C::RED . "Please type: /pluginpacks help");
    }
}