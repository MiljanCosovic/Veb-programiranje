<?php


if(isset($_POST["submit"])){
    
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $mestoRodjenja = $_POST['mestoRodjenja'];
    $drzavaRodjenja = $_POST['drzavaRodjenja'];
    $pol = $_POST['pol'];
    $datumRodjenja = $_POST['datumRodjenja'];
    $maticni = $_POST['maticni'];
    $brojTelefona = $_POST['brojTelefona'];
    $email = $_POST['email'];
    $usernameeee = $_POST['usernameeee'];
    $lozinka = $_POST['lozinka'];
    $potvrdaLozinke = $_POST['potvrdaLozinke'];
    $tip = "pacijent";


    include "config.php";
    include "function.php";

    if(emptyInput($ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $potvrdaLozinke) !== false)
    {
        
        header("location: registracija.php?error=prazaninput");
        exit();
    }
    if(proveraUser($usernameeee) !== false)
    {
        header("location: registracija.php?error=losUsername");
        exit();
    }
    if(proveraEmail($email) !== false)
    {
        header("location: registracija.php?error=losEmail");
        exit();
    }
    if(proveraLozinke($lozinka,$potvrdaLozinke) !== false)
    {
        header("location: registracija.php?error=losaLozinka");
        exit();
    }

    if(zauzetUser($conn, $usernameeee, $email ) !== false)
    {
        header("location: registracija.php?error=usernamezauzet");
        exit();
    }


    createUser($conn,$ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $tip);    
    
}
else
{
    header("location: registracija.php");
    exit();
}


?>