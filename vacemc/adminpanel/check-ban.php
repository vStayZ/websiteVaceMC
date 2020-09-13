<?php
  require("inc/dbconn/dbconn-bungeesystem.inc.php");
  require 'mojang-api.class.php';

  $str = $_POST["checkban"];

  $stmt = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");
  $stmt->execute();
  $uuid = $stmt->fetch();

  require("inc/dbconn/dbconn-ban.inc.php");

  $ende = "-1";
  $grund = "HausVerbot";
  $ersteller = "CONSOLE";
  $type = "NETWORK";

  $sth = $dbh->prepare("INSERT INTO ban (UUID, Ende, Grund, Ersteller, IP, Type) VALUES (:uuid, :ende, :grund, :ersteller, :ip, :type)");
  $sth->bindParam(":uuid", $uuid["UUID"], PDO::PARAM_STR);
  $sth->bindParam(":ende", $ende, PDO::PARAM_STR);
  $sth->bindParam(":grund", $grund, PDO::PARAM_STR);
  $sth->bindParam(":ersteller", $ersteller, PDO::PARAM_STR);
  $sth->bindParam(":ip", $uuid["IP"], PDO::PARAM_STR);
  $sth->bindParam(":type", $type, PDO::PARAM_STR);
  $sth->execute();

  $time = time();

  $sth = $dbh->prepare("INSERT INTO banhistory (UUID, Ende, Grund, Ersteller, Erstelldatum, IP, Type, duration) VALUES (:uuid, :ende, :grund, :ersteller, :erstelldatum, :ip, :type, :duration)");
  $sth->bindParam(":uuid", $uuid["UUID"], PDO::PARAM_STR);
  $sth->bindParam(":ende", $ende, PDO::PARAM_STR);
  $sth->bindParam(":grund", $grund, PDO::PARAM_STR);
  $sth->bindParam(":ersteller", $ersteller, PDO::PARAM_STR);
  $sth->bindParam(":erstelldatum", date("d.m.Y H:i:s", $time), PDO::PARAM_STR);
  $sth->bindParam(":ip", $uuid["IP"], PDO::PARAM_STR);
  $sth->bindParam(":type", $type, PDO::PARAM_STR);
  $sth->bindParam(":duration", $ende, PDO::PARAM_STR);
  $sth->execute();

  header("Location: adminpanel.php?check=ban");
  exit();
?>
