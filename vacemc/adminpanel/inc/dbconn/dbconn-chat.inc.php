<?php
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=BanSystem', $user, $pw);
    foreach ($dbh->query('SELECT * from chat') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
