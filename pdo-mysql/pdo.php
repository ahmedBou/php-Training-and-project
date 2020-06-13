<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc','root','root');
$stmt = $pdo->query("SELECT name,email,PASSWORD FROM users");
// see the error folder for more detail
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)

?>