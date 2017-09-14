<?php
//Start the session
session_start();

//Destroy the session
session_destroy();

//Return to index.php
header("location: ../index.php");
?>