<?php
$user = "USER";
$pw = "PASS";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ReportSystem', $user, $pw);
    foreach ($dbh->query('SELECT * from Report') as $row) {
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    exit();
}
?>
