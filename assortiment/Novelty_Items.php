<?php
include("../database_connection.php");
include("../functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" />
    <title>Title</title>
</head>
<body>
<div class="wrapper">
    <header class="main-head">
        <div class="logo-container">
            <a href="../index.php">
                <img border="0" alt="logo" src="../wwiLogo.png">
            </a>
        </div>
        <ul class="nav-links">
            <li class="link1"><a class="nav-link" href="../index.php">Acties</a></li>
            <li class="link1"><a class="nav-link" href="../producten.php">Producten</a></li>
            <li class="link1"><a class="nav-link" href="../over_ons.php">Over ons</a></li>
            <li class="link1"><a class="nav-link" href="#">Inloggen</a></li
        </ul>
        <div class="wrap">
            <form action="" method="post">

                <div class="search">
                    <input type="text" class="searchTerm" placeholder="Waar bent u naar op zoek?" name="search">
                    <button type="submit" class="searchButton">
                        &#128269;
                    </button>
                </div>
            </form>
        </div>
    </header>
    <nav class="main-nav">
        <ul>
            <div class="navandproduct">
                <div class="stock">
                    <div class="stock-select">
                        <?php
                        get_stockGroups();
                        ?>
                    </div>
        </ul>
    </nav>
    <article class="content"><h1>Main article area</h1>
        <p>In this layout, we display the areas in source order for any screen less that 500 pixels wide. We go to a two column layout, and then to a three column layout by redefining the grid, and the placement of items on the grid.</p>
        <ul class="listing">
            <?php
            get_products_novelty_items();
            ?>

        </ul>
    </article>



    <aside class="side">Sidebar</aside>


    <div class="ad">Advertising</div>
</div>


</body>

<footer class="main-footer">The footer</footer>

</html>
