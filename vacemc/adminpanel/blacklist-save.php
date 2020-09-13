<?php
  require("inc/dbconn/dbconn-vacemcadminpanel.php");

  $stmt = $dbh->prepare("INSERT INTO blacklist (comment, IP) VALUES (:comment, :ip)");
  $stmt->bindParam(":comment", $_GET["comment"], PDO::PARAM_STR);
  $stmt->bindParam(":ip", $_GET["ipadresse"], PDO::PARAM_STR);
  $stmt->execute();

  header("Location: adminpanel.php?blacklist");
  exit();
?>
