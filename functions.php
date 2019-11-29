<?php
include("database_connection.php");



//these functions will show our stockgroups
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

//these functions will check the products in our database
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
        $id = $row ['stockitemid'];
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

//these functions will check if they didn't enter their information
function firstname_correct()
{
    if (isset($_POST["firstname"])) {
        $firstname = $_POST['firstname'];
        print $firstname;
    }
}

function lastname_correct()
{
    if (isset($_POST["lastname"])) {
        $lastname = $_POST['lastname'];
        print ($lastname);
    }
}

function mail_correct()
{
    if (isset($_POST["mail"])) {
        $mail = $_POST['mail'];
        print ($mail);
    }
}


function adress_correct()
{
    if (isset($_POST["adress"])) {
        $adress = $_POST['adress'];
        print ($adress);
    }
}

function district_correct()
{
    if (isset($_POST["district"])) {
        $district = $_POST['district'];
        print ($district);
    }
}

function postalcode_correct()
{
    if (isset($_POST["postalcode"])) {
        $postalcode = $_POST['postalcode'];
        print ($postalcode);
    }
}

function phone_correct()
{
    if (isset($_POST["phone"])) {
        $phone = $_POST['phone'];
        print ($phone);
    }
}

//this function go to payment site
function gotoheader(){
    header('location: ../WWI_ICTM1G2/examples/payments/create-ideal-payment.php');
}

//first part of information.php
function firstpart(){
    if (isset($_POST["bestellen"])) {

        if (!isset($_POST['firstname']) || $_POST['firstname']=="") {


        } elseif (!isset($_POST['lastname']) || $_POST['lastname']=="") {


        } elseif (!isset($_POST['mail']) || $_POST['mail']=="") {


        } elseif (!isset($_POST['adress']) || $_POST['adress']=="") {


        } elseif (!isset($_POST['district']) || $_POST['district']=="") {


        } elseif (!isset($_POST['postalcode']) || $_POST['postalcode']=="") {


        } elseif (!isset($_POST['phone']) || $_POST['phone']=="") {


        } else {

            //everything becomes a variable
            $name = $_POST['firstname'] . " " . $_POST['lastname'];
            $mail = $_POST['mail'];
            $adress = $_POST['adress'];
            $district = $_POST['district'];
            $postalcode = $_POST['postalcode'];
            $phone = $_POST['phone'];

            $link = mysqli_connect("localhost", "root", "", "wideworldimporters");

            // Check connection
            if($link === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            $sql = "INSERT INTO customers_archive (CustomerName, Mail, PhoneNumber, DeliveryAddressLine2, PostalAddressLine2, DeliveryPostalCode) VALUES ('$name', '$mail', '$phone', '$adress', '$district', '$postalcode')";
            if(mysqli_query($link, $sql)){
                gotoheader();

            } else{
                echo "Er is helaas iets fout gegaan, probeer het opnieuw. " . mysqli_error($link);
            }
        }
    }
}

//last part of information.php
function lastpart(){
    if (isset($_POST["bestellen"])) {

        if (!isset($_POST['firstname']) || $_POST['firstname']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['lastname']) || $_POST['lastname']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['mail']) || $_POST['mail']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['adress']) || $_POST['adress']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['district']) || $_POST['district']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['postalcode']) || $_POST['postalcode']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        } elseif (!isset($_POST['phone']) || $_POST['phone']=="") {
            print("<div class='errors'><a><h2>u heeft niet alle gegevens ingevuld</h2></a></div>");

        }
    }
}
?>
