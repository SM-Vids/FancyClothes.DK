        <?php session_start();
        ?>
        <?php require "sections/top.php"; ?>
        <main>
                <?php
                if (isset($_SESSION['userName'])){ ?>
                        <form id="formNewArticle" action="admin/insertArticle.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="formHeading" id="formHeading" placeholder="Overskrift" required>
                        <input type="file" id="formImgSrc" name="formImgSrc" required>
                        <input type="text" name="formImgAlt" id="formImgAlt" placeholder="Beskrivelse af billedet" required>
                        <textarea rows="6" type="text" name="formDescription" id="formDescription" placeholder="Beskrivelse af produktet" required></textarea>
                        <select name="formStars" id="formStars" required>
                        <option value="">Stjerner</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                        <select name="formCategory" id="formCategory" required>
                        <option value="">Kategori</option>
                        <option value="jackets">Jakker</option>
                        <option value="pants">Bukser</option>
                        <option value="shirts">Skjorter</option>
                        <option value="knit">Strik</option>
                        <option value="t-shirts">T-shirts & tank Tops</option>
                        <option value="bags">Tasker</option>
                        </select>
                        <button type="submit" value="submit">Indsend</button>
                        </form>
                        <?php
                } ?>
                <div id="section-container">
        <div id="malesection">
                <h2>Herretøj</h2>
                <button>Lær mere</button>
        </div>
        <div id="womansection">
                <h2>Kvindetøj</h2>
                <button>Lær mere</button>
        </div>
        </div>
        <?php require "admin/getArticles.php"; ?>
        </main>
        <?php require "sections/bottom.php"; ?>      