<?php
include("database_connection.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css" />
    <title>Title</title>
</head>
<div class="wrapper">
    <header class="main-head">
        <div class="logo-container">
            <a href="index.php">
                <img border="0" alt="logo" src="wwiLogo.png">
            </a>
        </div>
        <ul class="nav-links">
            <li class="link1"><a class="nav-link" href="acties.php">Acties</a></li>
            <li class="link1"><a class="nav-link" href="producten.php">Producten</a></li>
            <li class="link1"><a class="nav-link" href="over_ons.php">Over ons</a></li>
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
                        get_stockGroupshomepage();
                        ?>
                    </div>
        </ul>
    </nav>
    <article class="content"><h1>Wij zijn Wolrd Wide Importers</h1>
        <p>“Wij zijn WWI. We zijn trots op onze producten en geloven in kwaliteit.
            In ieder huis vindt een product van WWI zijn thuis.<br> Ondanks onze grootte
            zien klanten ons als kleinschalig en betrokken.
            <br>
            <br>
            Persoonlijk klantcontact
            staat bij ons hoog in het vaandel.”</p>

        <div class="aboutUs">
            <img src="./img/aboutUsPicture.png"/>
        </div>
    </article>



    <aside class="side">Sidebar</aside>


    <div class="ad">Advertising</div>
    <footer class="main-footer">The footer</footer>
</div>






<body>

</body>
</html>
