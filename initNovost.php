<?php


if(isset($_POST["submitt"])){

    $slika = $_POST['adresaSlike'];
    $naslov = $_POST['naslov'];
    $tekstt = $_POST['tekstovi'];


    
    include "config.php";
    include "function.php";


    dodajVest($conn, $slika,$naslov, $tekstt);


}
else
{
    header("location: dodajNovostA.php");
    exit();
}





?>