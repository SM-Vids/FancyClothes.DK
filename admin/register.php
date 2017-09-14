<?php
//Varibles
$formNewUsername = $_POST['newUsername'];
$formNewPassword = $_POST['newPassword'];
$formNewPasswordRepeat = $_POST['newPasswordRepeat'];

//Get connect.php and write it here
require_once "connect.php";

//SQL to be executed
$statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ?");

//Bind $formNewUsername to ?
$statement->bindParam(1, $formNewUsername);
$statement->execute();

if ($row = $statement->fetch()) {
        //If $row is not empty the username is already in use
    echo "<script>alert(\"Sorry this username is already in use.\");</script>";
    echo "<script>setTimeout(\"location.href = '../login.php';\",1);</script>";
}
//Checks if the passwords match
else if ($formNewPassword == $formNewPasswordRepeat) {
        //Registers the user in the database
        $statement = $dbh->prepare("INSERT INTO `users` (`dbUsername`, `dbPassword`) VALUES (?, ?);");
        $statement->bindParam(1, $formNewUsername);
        $statement->bindParam(2, $formNewPassword);
        $statement->execute();
        
        echo "<script>alert(\"You are now registered in our database.\");</script>";
        echo "<script>setTimeout(\"location.href = '../login.php';\",1);</script>";
} else{
        echo "<script>alert(\"Sorry the passwords didn't match.\");</script>";
        echo "<script>setTimeout(\"location.href = '../login.php';\",1);</script>";
}
?>