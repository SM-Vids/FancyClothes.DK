<?php
$category = $_GET['category'];

    //find conncect.php og indsæt den her men ikke hvis den allerede er i dokumentet
    require_once "connect.php";

    //lav en variabel "statement" og put sql koden over i den. (dbh har forbindelse til databasen)
    //sql koden tager alt i tabellen "articles" og soterer dem fra højest id til lavest id
    $statement = $dbh->prepare("SELECT * FROM products JOIN users ON users.userId = products.authorId WHERE category = ? ORDER BY id DESC ");

    $statement->bindParam(1, $category);

    //kør sql koden i databasen
    $statement->execute();

    //lav et while loop der kører så længe der er linjer i "$statement"
    while($row = $statement->fetch()){

        /*stop php og indsæt article tag og h2 tag derefter start php igen*/?>
        <article>
            <img src="img/<?php echo $row['imgSrc']; ?>" alt="<?php echo $row['imgAlt']; ?>">
            
            <h4><?php echo $row['heading']; ?></h4>

            <div id="star-container">
            <?php
            $a = 0;
            while ($a < $row['stars'] ) {
                echo '<i class="fa fa-star yellow" aria-hidden="true"></i>';

                $a = $a + 1;
            }
            while ($a < 5){
                echo '<i class="fa fa-star-o" aria-hidden="true"></i>';

                $a = $a + 1;
            }
            ?>
            </div>
            <div id="grey">
            <p class="time"><?php echo $row['published']; ?> by: <?php echo $row['dbUsername']; ?></p>
            <p class="description"><?php echo $row['description']; ?></p>
            <a class="read-more" href="#">Læs mere...</a>
            <br>
		    
            <?php
                if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 1 ) {
                    ?>
                    <a href="Admin/deleteArticle.php?articleId=<?php echo $row['id']; ?>">Slet mig</a>
                    <?php
                }
                else if(isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == 2 && $_SESSION['userName'] == $row['dbUsername']){
                    ?>
                    <a href="Admin/deleteArticle.php?articleId=<?php echo $row['id']; ?>">Slet mig</a>
                    <?php
                }
            ?>
            </div>
	</article>
    <?php
    //lukker while loop
    }
    $dbh = null;
?>