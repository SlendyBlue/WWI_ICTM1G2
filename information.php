<?php
include("database_connection.php");
include("functions.php");
?>

<?php
firstpart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css" />
    <title>Title</title>
</head>
<body>
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
    <article class="content"><h1>Vul hier uw gegevens in</h1>


        <form method="post" action="information.php">
            <div class="info">
                <ul>

                    <li>
                        Voornaam:<br>
                        <input type="text" value="<?php firstname_correct() ?>" name="firstname"><br>
                    </li>
                    <li>
                        Achternaam:<br>
                        <input type="text" value="<?php lastname_correct() ?>" name="lastname"><br>
                    </li>
                    <li>
                        E-mail:<br>
                        <input type="email" value="<?php mail_correct() ?>" name="mail"><br>
                    </li>
                    <li>
                        Telefoonnummer:<br>
                        <input type="tel" value="<?php phone_correct() ?>" name="phone"><br>
                    </li>
                </ul>
            </div>
            <div class="info">
                <ul>
                    <li>
                        Adres:<br>
                        <input type="text" value="<?php adress_correct() ?>" name="adress"><br>
                    </li>
                    <li>
                        Woonplaats:<br>
                        <input type="text" value="<?php district_correct() ?>" name="district"><br>
                    </li>
                    <li>
                        Postcode:<br>
                        <input type="text" value="<?php postalcode_correct() ?>" name="postalcode"><br>
                    </li>
                </ul>
            </div>

                    <input type=submit class="buy" value='Bestel nu' name=bestellen>
                </ul>
             </form>
        <?php
          lastpart();
        ?>
    </article>




    <aside class="side">Sidebar</aside>


    <div class="ad">Advertising</div>
</div>


</body>

<footer class="main-footer">The footer</footer>

</html>
