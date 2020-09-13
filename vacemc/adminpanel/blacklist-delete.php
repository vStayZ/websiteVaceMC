<?php
  require("inc/dbconn/dbconn-vacemcadminpanel.php");

  $ID = $_GET["ID"];

  $stmt = $dbh->prepare("DELETE FROM blacklist WHERE ID = :id");
  $stmt->bindParam(":id", $ID, PDO::PARAM_STR);
  $stmt->execute();

  header("Location: adminpanel.php?blacklist");
  exit();
?>
