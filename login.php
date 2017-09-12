<?php require "sections/top.php"; ?>
        <main>
            <form id="loginForm" action="<?php echo basename($_SERVER[PHP_SELF]); ?>" method="POST">
            <label for="username">Indtast dit brugernavn:</label>
            <input type="text" id="username" name="username" placeholder="Brugernavn" required>
            <label for="password">Indtast dit kodeord:</label>
            <input type="password" id="password" name="password" placeholder="Kodeord" required>
            <button action="submit">Log Ind</button>
        </form>
        </main>
        <?php require "sections/bottom.php";

        //Username and password
        $formUsername = $_POST['formUsername'];
        $formPassword = $_POST['formPassword'];

        //Gets connect.php and puts it here
    require_once "admin/connect.php";

    //Prepares the DBH and binds the parameters
    $statement = $dbh->prepare("SELECT * FROM users WHERE dbUsername = ? AND dbPassword = ?");
    $statement->bindParam(1, $formUsername);
    $statement->bindParam(2, $formPassword);
    $statement->execute();

    //if the row is empty the user dosn't exist
    if(empty($row = $statement->fetch())){
        echo "<h4>Brugernavn eller kodeord var forkert</h4>";
    }else{ //starts the session of the user
        session_start();
        $_SESSION['userName'] = $row['dbUsername'];
        $_SESSION['accessLevel'] = $row['accessLevel'];
        $_SESSION['userId'] = $row['userId'];
        header("location: ../index.php");
    }
    ?>