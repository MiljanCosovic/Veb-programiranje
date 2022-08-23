<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediHelp</title>
    <style>
        <?php include 'verifikacija.css';
        include 'config.php';  ?>
    </style>
</head>

<body>
    <div class="container">

        <div class="hedaer">
            <div class="navbar fullScreen" id="menuHeader">
                <div class="logo-image">
                    <img src="./logo.png" alt="" class="logo">
                    <p> <span style="color: red;">Medi</span><span>Help</span></p>
                </div>
                <div class="menu">
                    <ul>
                        <li class="naslovna"><a href="naslovna.php">Početna</a></li>
                        <li class="usluge"><a href="novosti.php">Novosti</a></li>
                        <li class="simptomi"><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="osoblje.php">Osoblje</a></li>
                        <li class="contact"><a href="kontakt.php">Kontak</a></li>


                        <?php
                        if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "lekar") {
                            echo "<li class='prijavaa'><a href='profilLekar.php'>Profil</a></li>";
                            echo "<li class='prijavaa' ><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "admin") {
                            echo "<li class='prijavaa' ><a href='profilAdmin.php'>Profil</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "pacijent") {
                            echo "<li class='prijavaa'><a href='profilPacijent.php'>Profil</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else {
                            echo "<li class='prijavaa'><a href='login.php'>Prijavi se</a></li>";
                        }

                        ?>
                    </ul>
                    <label for="check" onclick="openMenu()">
                        <i id="hamburger" class="fas fa-bars"></i>
                    </label>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="midle">

                <?php
                include "config.php";
                include "function.php";

                $mejl = $_GET["mejlPost"];
                $sql = "UPDATE zahtevi SET verify='yes' WHERE mejl='$mejl'";

                if ($conn->query($sql) === TRUE) {
                } else {
                    echo "Error updating record: " . $conn->error;
                }

                $conn->close();

                session_destroy();




                ?>
                <div class="content_verify">
                    <h1 class="obavestenjeVerifikacija">Uspesno ste poslali zahtev za registraciju!<br>U najkracem vremenskom roku cemo uzeti Vas zahtev u razmatranje.<br>Hvala!</h1>
                    <button id="dugme_nazad" class="button-18" role="button"><a href="naslovna.php">Nazad na pocetnu stranicu<a></button>
                </div>
            </div>


        </div>






    </div>





    <div class="footer">







        <div class="medi">
            <h2 style="font-family: sans-serif;color: white">MediHelp</h2>
            <a>Relje Krilatice,28</a>
            <a>36300 Novi Pazar</a>
            <a>Tel/faks: 011 367 222</a>
            <a>Mobilni: 065 433 95 04</a>
            <a>E-mail: miljancosovicnp@gmail.com</a>
        </div>

        <div class="nav">
            <h2 style="font-family: sans-serif;color: white">Navigacija</h2>
            <a href="naslovna.php">> Pocetna</a>
            <a href="novosti.php">> Novosti</a>
            <a href="simptomi.php">> Simptomi</a>
            <a href="osoblje.php">> Osoblje</a>
            <a href="kontakt.php">> Kontakt</a>

        </div>

        <div class="radno">
            <h2 style="font-family: sans-serif;color: white">Radno vreme</h2>
            <a>Radnim danom: 08:00 - 21:00 h</a>
            <a>Subotom: 08:00 - 15:00 h</a>
            <a>Nedeljom ne radimo</a>

        </div>

        <div class="wrapper">
            <a href="kontakt.php"><span>Kontakt</span></a>
        </div>





    </div>

    <div class="footer2">
        <p>© 2022, Neurologija MediHelp | Novi Pazar</p>
    </div>











    </div>








</body>

</html>