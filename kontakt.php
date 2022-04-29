<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'kontakt.css' ?>
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
                        <li class="naslovna" y><a href="naslovna.php">Početna</a></li>
                        <li class="usluge"><a href="">Novosti</a></li>
                        <li class="simptomi"><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="">Osoblje</a></li>
                        <li class="contact" id="active"><a href="kontakt.php">Kontak</a></li>


                        <?php
                        if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "lekar") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilLekar</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "admin") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilAdmin</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "pacijent") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilPacinent</a></li>";
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



        <div class="cover_image">
            <p>KONTAKT</p>
        </div>


        <div class="content">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2911.0096860284298!2d20.515142515710938!3d43.14632589307579!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4756286b8b5dd4ad%3A0xf8614bc56cb7789b!2sRelje%20Krilatice%2C%20Novi%20Pazar!5e0!3m2!1sen!2srs!4v1651159030779!5m2!1sen!2srs" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>


            <div class="info">
                <h1>Kontaktirajte nas</h1>

                <div class="mail">
                    <i id="m" class="fas fa-envelope-open-text"></i>
                    <div>
                        <h3>Email</h3>
                        <p>miljancosovicnp@gmail.com</p>
                    </div>
                </div>


                <div class="mail">
                    <i id="m" class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Telefon</h3>
                        <p>065 433 95 04</p>
                    </div>
                </div>


                <div class="mail">
                    <i id="m" class="fas fa-map-pin"></i>
                    <div>
                        <h3>Adresa</h3>
                        <p>Relje Krilatice,28 <br>36300 Novi Pazar</p>
                    </div>
                </div>

                <div class="mail">
                    <i id="m" class="far fa-clock"></i>
                    <div>
                        <h3>Radno vreme</h3>
                        <p>Radnim danom: 08:00 - 21:00 h</p>
                        <p>Subotom: 08:00 - 15:00 h</p>
                        <p>Nedeljom ne radimo</p>
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
                <a>> Naslovna</a>
                <a>> Simptomi</a>
                <a>> Usluge</a>
                <a>> Osoblje</a>
                <a>> Kontakt</a>

            </div>

            <div class="radno">
                <h2 style="font-family: sans-serif;color: white">Radno vreme</h2>
                <a>Radnim danom: 08:00 - 21:00 h</a>
                <a>Subotom: 08:00 - 15:00 h</a>
                <a>Nedeljom ne radimo</a>

            </div>

            <div class="wrapper">
                <a href=""><span>Kontakt</span></a>
            </div>





        </div>

        <div class="footer2">
            <p>© 2022, Neurologija MediHelp | Novi Pazar</p>
        </div>


</body>

</html>