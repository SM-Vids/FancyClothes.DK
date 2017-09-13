<?php
$newsletterName = $_POST['newsletterName'];
$newsletterEmail = $_POST['newsletterEmail'];

require_once "connect.php";
$statement = $dbh->prepare("INSERT INTO newsletter (name, email) VALUES(?, ?) ");

$statement->bindParam(1, $newsletterName);
$statement->bindParam(2, $newsletterEmail);

$statement->execute();

header("location: ../index.php");
?>
