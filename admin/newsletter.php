<?php
//Varibles
$newsletterName = $_POST['newsletterName'];
$newsletterEmail = $_POST['newsletterEmail'];

//Require connect PHP once
require_once "connect.php";

//SQL to be executed
$statement = $dbh->prepare("INSERT INTO newsletter (name, email) VALUES(?, ?) ");

//Bind $newsletterEmail and $newsletterName to "?"
$statement->bindParam(1, $newsletterName);
$statement->bindParam(2, $newsletterEmail);

//Execute the statement
$statement->execute();

//Go back to index.php
header("location: ../index.php");
?>
