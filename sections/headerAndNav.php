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
            <p>
            <img src="img/homeIcon.png" alt="Hvid trøje logo">
            <?php
            if (isset($_SESSION['userName'])) {
                echo '<h2>Velkommen ';
                echo $_SESSION['userName'];
                echo '</h2>';
            }
            ?>
            </p>
        </div>
        <nav>
            <img id="nav-burger" src="img/menu.svg" alt="Navigations burger">
            <ul>
                <!-- if current php page is index.php give it class="active" -->
                <li><a href="index.php" <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                    echo 'class="active"';
                } ?>>Forside</a></li>
                <li><a href="#">Produkter</a></li>
                <li><a href="#">Nyheder</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="about.php" <?php if (basename($_SERVER['PHP_SELF']) == "about.php") {
                    echo 'class="active"';
                } ?>>Om os</a></li>
                <?php if (!isset($_SESSION['userName'])  && basename($_SERVER['PHP_SELF']) == "login.php") {
                    echo '<li><a class="active" href="login.php"> Log ind</a></li>';
                }
                else if (!isset($_SESSION['userId']) || $_SESSION['userId'] == 0) {
                    echo '<li><a href="login.php"> Log ind</a></li>';
                }
                else{
                    echo '<li><a href="admin/logout.php"> Log ud</a></li>';
                } ?>
            </ul>
            <div id="shopping-cart">
                <p>Din indkøbskurv er tom</p>
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
        </nav>