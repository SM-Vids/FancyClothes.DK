<?php
$formNewUsername = $_POST['newUsername'];
$formNewPassword = $_POST['newPassword'];
$formNewPasswordRepeat = $_POST['newPasswordRepeat'];

require_once "connect.php";

$statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ?");
$statement->bindParam(1, $formNewUsername);
$statement->execute();

if ($row = $statement->fetch()) {
    echo "<script>alert(\"Sorry this username is already in use.\");</script>";
    echo "<script>setTimeout(\"location.href = '../login.php';\",1);</script>";
}
else if ($formNewPassword == $formNewPasswordRepeat) {
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