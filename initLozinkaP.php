<?php


if(isset($_POST["submitt"])){

    $trLozinka = $_POST['trLozinka'];
    $nLozinka = $_POST['nLozinka'];
    $pLozinka = $_POST['nPotvrda'];


    
    include "config.php";
    include "function.php";


    promenaSifreP($conn,  $trLozinka, $nLozinka,$pLozinka );


}
else
{
    header("location: promenaSifre.php");
    exit();
}





?>