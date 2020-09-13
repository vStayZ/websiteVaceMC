<?php
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=BungeeSystem', $user, $pw);
    foreach ($dbh->query('SELECT * from Player_Data') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
