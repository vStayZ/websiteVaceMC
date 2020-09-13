<?php
  require("inc/dbconn/dbconn-bungeesystem.inc.php");
  require 'mojang-api.class.php';

  $str = $_POST["checkban"];

  $stmt = $dbh->prepare("SELECT * FROM Player_Data WHERE UUID = '$str'");
  $stmt->execute();
  $uuid = $stmt->fetch();

  require("inc/dbconn/dbconn-ban.inc.php");

  $sth = $dbh->prepare("DELETE FROM ban WHERE UUID = :uuid");
  $sth->bindParam(":uuid", $uuid["UUID"], PDO::PARAM_STR);
  $sth->execute();

  header("Location: adminpanel.php?check=unban");
  exit();
?>
