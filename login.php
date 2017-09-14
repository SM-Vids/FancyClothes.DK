<?php 
session_start();
$title = "Login & Registrer";
$description = "Registrer dig på vores side så du kan købe vores tøj, sko eller tasker.";
require "sections/top.php"; ?>
        <main id="column">
            <form id="loginForm" action="admin/checkLogin.php" method="POST">
            <label for="formUsername">Indtast dit brugernavn:</label>
            <input type="text" id="formUsername" name="formUsername" placeholder="Brugernavn" required>
            <label for="formPassword">Indtast dit kodeord:</label>
            <input type="password" id="formPassword" name="formPassword" placeholder="Kodeord" required>
            <button>Log ind</button>
        </form>
        <?php
        if (isset($_SESSION['userid']) && $_SESSION['userid'] == 0) {
            echo '<h4 id="red">Beklager forkert brugernavn eller kodeord. Prøv igen</h4>';
        }
        
        ?>
        <a id="newUserLink" href="#">Ny bruger?</a>
        <form action="admin/register.php" id="newUser" method="POST">
            <label for="newUsername">Brugernavn:</label>
            <input type="text" id="newUsername" name="newUsername" placeholder="Brugernavn" required>
            <label for="newPassword">Kodeord:</label>
            <input type="password" id="newPassword" name="newPassword" placeholder="Kodeord" required>
            <label for="newPasswordRepeat">Indtast dit kodeord igen:</label>
            <input type="password" id="newPasswordRepeat" name="newPasswordRepeat" placeholder="Gentag kodeord" required>
            <button type="submit" value="submit">Opret</button>
        </form>
        </main>
        <?php require "sections/bottom.php";
    ?>