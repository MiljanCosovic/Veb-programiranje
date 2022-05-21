<?php


function emptyInput($ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $potvrdaLozinke)
{

    if (empty($ime) || empty($prezime) || empty($mestoRodjenja) || empty($drzavaRodjenja) || empty($pol) || empty($datumRodjenja) || empty($maticni) || empty($brojTelefona) || empty($email) || empty($usernameeee) || empty($lozinka) || empty($potvrdaLozinke)) {

        $result = true;
    } else {
        $result =  false;
    }
    return $result;
}


function proveraUser($usernameeee)
{
    if (!preg_match("/^[a-zA-z0-9]*$/", $usernameeee)) {

        $result = true;
    } else {
        $result =  false;
    }
    return $result;
}

function proveraEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    } else {
        $result =  false;
    }
    return $result;
}

function proveraLozinke($lozinka, $potvrdaLozinke)
{

    if ($lozinka !== $potvrdaLozinke) {
        $result = true;
    } else {
        $result =  false;
    }
    return $result;
}




function zauzetUser($conn, $usernameeee, $email)
{
    $sql = "SELECT * FROM oke2  WHERE usern = ? OR mejl = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: registracija.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $usernameeee,  $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }


    mysqli_stmt_close($stmt);
}


function createUser($conn, $ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $lozinka, $tip)
{

    $sql = "INSERT INTO oke2 (ime,prezime,mestoRodjenja,drzavaRodjenja,pol,datumRodjenja,maticni, brojTelefona,mejl, usern, lozinka,tip)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: registracija.php?error=stmtfailed");
        exit();
    }

    $hashedLozinka = password_hash($lozinka, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "ssssssssssss", $ime, $prezime, $mestoRodjenja, $drzavaRodjenja, $pol,  $datumRodjenja,  $maticni, $brojTelefona,   $email, $usernameeee,  $hashedLozinka,$tip);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: registracija.php?error=none");
    exit();
}


function emptyInputLogin($usernameeee, $lozinka)
{

    if (empty($usernameeee) || empty($lozinka)) {

        $result = true;
    } else {
        $result =  false;
    }
    return $result;
}


function loginUser($conn,$usernameeee,$lozinka){

    $zauzetUsern=zauzetUser($conn, $usernameeee, $usernameeee);
    echo "$zauzetUsern";
    if($zauzetUsern === false)
    {
        header("location: login.php?error=NetacanUsername");
        exit(); 
    }
    

    $LozinkaHash = $zauzetUsern["lozinka"];

    $proveraLozinkeeee = password_verify($lozinka,$LozinkaHash);
    if($proveraLozinkeeee === false)
    {
        header("location: login.php?error=NetacnaLozinka");
        exit(); 
    }
    else if($proveraLozinkeeee === true)
    {
        session_start();
    
        $_SESSION["userN"] = $zauzetUsern["usern"];
        $_SESSION["TipU"] = $zauzetUsern["tip"];

        
        header("location: naslovna.php");
        exit(); 
    }
}


