<?php
include("database_connection.php");



//deze function laat alle stockgroepen zien
function get_stockGroups()
{

    $sql = 'SELECT stockgroupname FROM stockgroups';
    global $database;
    $result = $database->query($sql);
    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    while ($row = $result->fetch_assoc()) {
        $value=$row["stockgroupname"];
        $webpage = str_replace(" ", "_",$value);
        print("<button class='stock-select'><a href= ../assortiment/$webpage.php>$value</a></button><br>");
    }

}

function get_stockGroupshomepage()
{

    $sql = 'SELECT stockgroupname FROM stockgroups';
    global $database;
    $result = $database->query($sql);
    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    while ($row = $result->fetch_assoc()) {
        $value=$row["stockgroupname"];
        $webpage = str_replace(" ", "_",$value);
        print("<button class='stock-select'><a href= assortiment/$webpage.php>$value</a></button><br>");
    }

}

/*laat temperatuur in celcius en fahrenheit zien
function temperatuur()
{
    include ("database_connection.php");
//sql queery dit is op een specifiek product, het moet worden aangepast
    $sql = "select * from stockitems s join coldroomtemperatures_archive c on S.StockItemID = c.ColdRoomTemperatureID where s.IsChillerStock = 1 and s.StockItemID = 220";
    $link = mysqli_connect('localhost', 'root', '', 'wideworldimporters');

//resultaat van de queery
    $result = mysqli_query($link, $sql);

//result in celcius en fahrenheit
    while ($uitkomst = mysqli_fetch_array($result)) {
        {
            echo round($uitkomst["Temperature"]) . " Celcius";
            echo round($uitkomst["Temperature"] * 1.8 + 32) . " Fahrenheit \n";
        }
    }
}
*/


function get_products_specialdeals(){
    global $database;
    $sql = "select s.StockItemName,s.stockitemid, s.SearchDetails, s.UnitPrice, d.DealDescription 
from stockitems s join stockgroups i
on s.StockItemID = i.StockGroupID
left join specialdeals d
on i.StockGroupID = d.StockGroupID
order by DealDescription desc";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        $korting = $row ['DealDescription'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><h2>" . $korting . "</h2><br> <div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}





function get_allitems()
{

    $sql = 'select stockitemname from stockitems';
    global $database;
    $result = $database->query($sql);
    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    while ($row = $result->fetch_assoc()) {
        $value=$row["stockitemname"];
        print ($value . "<br>");
    }

}

function get_products(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
group by stockitemid";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_airline_novelties(){
    global $database;
    $sql = "SELECT Photo, Tags, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where Tags like '%Comfortable%'
group by stockitemid";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_clothing(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 2
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_computing_novelties(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 6
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_furry_footwear(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 8
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_mugs(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 3
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_novelty_items(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 1
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_packaging_materials(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 10
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_tshirts(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 4
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_toys(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 9
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}

function get_products_usb_novelties(){
    global $database;
    $sql = "SELECT Photo, StockItemName,si.stockitemid StockItemId, SearchDetails, UnitPrice 
FROM stockitems si 
JOIN stockitemstockgroups sig ON si.stockitemid = sig.stockitemid 
JOIN stockgroups sg ON sig.stockgroupid = sg.stockgroupid 
where sig.StockGroupID = 7
group by stockitemid
";

    $result = $database->query($sql);

    if ($database->connect_error) {
        die("Connection failed: connection error " . $database->connect_error);
    }

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $name = $row['StockItemName'];
        $price = $row['UnitPrice'];
        print("<li><div class='cta'><a href=\"\">" . $name . " </a></div><br><h3> €" . $price . "</h3><br><div class='addtocard'><a href=\"\">Aan winkelmandje toevoegen</a></div></li>");
    }
}
?>
