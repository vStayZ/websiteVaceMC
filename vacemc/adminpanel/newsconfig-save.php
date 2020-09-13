<?php
require("inc/dbconn/dbconn-vacemcadminpanel.php");

// Delete
$stmt = $dbh->prepare("DELETE FROM newsconfig");
$stmt->execute();

// Save
$stmt = $dbh->prepare("INSERT INTO newsconfig (titel, message) VALUES (:titel, :message)");
$stmt->bindParam(":titel", $_GET["titel"], PDO::PARAM_STR);
$stmt->bindParam(":message", $_GET["message"], PDO::PARAM_STR);
$stmt->execute();

header("Location: adminpanel.php?config");
exit();
?>
