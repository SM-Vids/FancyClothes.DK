<?php
session_start();
//Varibles(
    $heading=$_POST['formHeading'];
    $imgSrc= $_FILES['formImgSrc'];
    $imgAlt=$_POST['formImgAlt'];
    $description=$_POST['formDescription'];
    $currentUser = $_SESSION['userId'];
    $stars = $_POST['formStars'];
    $category = $_POST['formCategory'];

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["formImgSrc"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    
    if(true) {
        $check = getimagesize($_FILES["formImgSrc"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            $imgSrc = basename($_FILES["formImgSrc"]["name"]);
        }
        // Check file size
        if ($_FILES["formImgSrc"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["formImgSrc"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["formImgSrc"]["name"]). " has been uploaded.";
                $imgSrc = basename($_FILES["formImgSrc"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    //Send to database
    require_once "connect.php";
    echo $currentUser;
    $statement = $dbh->prepare("INSERT INTO products (heading, authorId, imgSrc, imgAlt, description, stars, category) VALUES(?, ?, ?, ?, ?, ?, ?) ");
    
    $statement->bindParam(1, $heading);
    $statement->bindParam(2, $currentUser);
    $statement->bindParam(3, $_FILES["formImgSrc"]["name"]);
    $statement->bindParam(4, $imgAlt);
    $statement->bindParam(5, $description);
    $statement->bindParam(6, $stars);
    $statement->bindparam(7, $category);
    
    $statement->execute();

    header("location: ../index.php");
    ?>