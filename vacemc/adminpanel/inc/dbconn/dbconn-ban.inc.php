<?php
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=BanSystemNeu', $user, $pw);
    foreach ($dbh->query('SELECT * from ban') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
