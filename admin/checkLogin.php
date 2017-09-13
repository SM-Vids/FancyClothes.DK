<?php
    $formUsername = $_POST['formUsername'];
    $formPassword = $_POST['formPassword'];

    //Gets connect.php and puts it here
require_once "connect.php";

//Prepares the DBH and binds the parameters
$statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ? AND dbPassword = ?");
$statement->bindParam(1, $formUsername);
$statement->bindParam(2, $formPassword);
$statement->execute();

//if the row is empty the user dosn't exist
if(empty($row = $statement->fetch())){
    session_start();
    $_SESSION['userid'] = 0;
    header("location: ../login.php");
}else{ //starts the session of the user
    session_start();
    $_SESSION['userName'] = $row['dbUsername'];
    $_SESSION['accessLevel'] = $row['accessLevel'];
    $_SESSION['userId'] = $row['userId'];
    header("location: ../index.php");
}
?>