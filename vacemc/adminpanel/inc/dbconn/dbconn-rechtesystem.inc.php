<?php
error_reporting(E_ALL & ~E_WARNING);
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=RechteSystem', $user, $pw);
    foreach ($dbh->query('SELECT * from id') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
