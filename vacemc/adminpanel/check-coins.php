<?php
  require("inc/dbconn/dbconn-bungeesystem.inc.php");
  require 'mojang-api.class.php';

  if(isset($_GET["coins-lobby"])){
    $uuid = $_GET["checkcoins"];
    $coins = $_GET["coins-lobby"];

    $stmt = $dbh->prepare("UPDATE `Lobby` SET `Coins`= '$coins' WHERE UUID = '$uuid'");
    $stmt->execute();
    header("Location: adminpanel.php?check=lobbycoins");
    exit();
  }elseif(isset($_GET["coins-citybuild"])){
    $uuid = $_GET["checkcoins"];
    $coins = $_GET["coins-citybuild"];

    $stmt = $dbh->prepare("UPDATE `Citybuild` SET `Coins`= '$coins' WHERE UUID = '$uuid'");
    $stmt->execute();
    header("Location: adminpanel.php?check=citybuildcoins");
    exit();
  }elseif(isset($_GET["coins-skyblock"])){
    $uuid = $_GET["checkcoins"];
    $coins = $_GET["coins-skyblock"];

    $stmt = $dbh->prepare("UPDATE `Skyblock` SET `Coins`= '$coins' WHERE UUID = '$uuid'");
    $stmt->execute();
    header("Location: adminpanel.php?check=skyblockcoins");
    exit();
  }else{
    $uuid = $_GET["checkcoins"];
    $coins = $_GET["coins-joinme"];

    $stmt = $dbh->prepare("UPDATE `Player_Stats` SET `Joinme`= '$coins' WHERE UUID = '$uuid'");
    $stmt->execute();
    header("Location: adminpanel.php?check=joinmecoins");
    exit();
  }
?>
