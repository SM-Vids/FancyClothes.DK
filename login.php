<?php 
session_start();
require "sections/top.php"; ?>
        <main>
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
        </main>
        <?php require "sections/bottom.php";
    ?>