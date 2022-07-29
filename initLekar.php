<?php


if(isset($_POST["submitt"])){
    
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
    $tip = "lekar";
    $slika="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg";


    include "config.php";
    include "function.php";

    if(emptyInput($ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $potvrdaLozinke) !== false)
    {
        
        header("location: dodajLekara.php?error=prazaninput");
        exit();
    }
    if(proveraUser($usernameeee) !== false)
    {
        header("location: dodajLekara.php?error=losUsername");
        exit();
    }
    if(proveraEmail($email) !== false)
    {
        header("location: dodajLekara.php?error=losEmail");
        exit();
    }
    if(proveraLozinke($lozinka,$potvrdaLozinke) !== false)
    {
        header("location: dodajLekara.php?error=losaLozinka");
        exit();
    }

    if(zauzetUser($conn, $usernameeee, $email ) !== false)
    {
        header("location: dodajLekara.php?error=usernamezauzet");
        exit();
    }


    createUserLekar($conn, $ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $tip,$slika);    
    
}
else
{
    header("location: dodajLekara.php");
    exit();
}


?>