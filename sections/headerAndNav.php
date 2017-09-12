<body>
    <header>
        <div id="lang">
            <p id="icon">
                <img src="img/ikon.png" alt="Det danske flag Dannebrog"> Dansk</p>
                <p id="currency">DDK</p>
            </div>
            <form action="">
                <input type="text" placeholder="Indtast søgning">
                <button>Søg</button>
            </form>
        </header>
        <div id="home-logo">
            <img src="img/homeIcon.png" alt="Hvid trøje logo">
            <?php
            if (isset($_SESSION['username'])) {
                echo "<h2>Velkommen " + $_SESSION['username'] +"</h2>";
            } else {
                # code...
            }
            
            ?>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                    echo 'class="active"';
                } ?>>Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Om os</a></li>
                <li><a href="login.php" <?php if (basename($_SERVER['PHP_SELF']) == "login.php") {
                    echo 'class="active"';
                } ?>>Log ind</a></li>
            </ul>
            <div id="shopping-cart">
                <p>Din indkøbskurv er tom</p>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </nav>