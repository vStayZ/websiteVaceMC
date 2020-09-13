<?php
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=vacemcadminpanel', $user, $pw);
    foreach ($dbh->query('SELECT * from newsconfig') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
