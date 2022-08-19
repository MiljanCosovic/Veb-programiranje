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
    <style><?php include 'zaboravljenaLozinka.css' ?><?php include 'registracija.js' ?></style>
</head>

<body>


    <div class="container">

        <div class="hedaer">
            <div class="navbar fullScreen" id="menuHeader">
                <div class="logo-image">
                    <p> <span style="color: red;">Medi</span><span>Help</span></p>
                </div>
                <div class="menu">
                    <ul>
                        <li class="naslovna"><a href="naslovna.php">Početna</a></li>
                        <li class="usluge"><a href="novosti.php">Novosti</a></li>
                        <li class="simptomi" ><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="osoblje.php">Osoblje</a></li>
                        <li class="contact"><a href="kontakt.php">Kontak</a></li>
                        <li class="prijavaa" id="active"><a href="login.php">Prijavi se</a></li>
                    </ul>
                    <label for="check" onclick="openMenu()">
                        <i id="hamburger" class="fas fa-bars"></i>
                    </label>
                </div>
            </div>
        </div>



        <div class="main">
            <div class="prijava">
                <h1>Zaboravljena lozinka</h1>



                <form action="initZabLozinka.php" method="POST">

                <div class="Ime2">
                        <label for="">E-mail:</label>
                    </div>
                    <div class="ime">
                        <div class="ikon"><i class="fa-solid fa-envelope"></i></div>
                        <div class="input"><input class="im" type="text" name="email" placeholder="Uneti E-mail:" required></div>
                    </div>

                   
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "NetacanUsername") {
                            echo "<p style='color:red;font-size: 20px;margin-top:10px'>Neispravan username!</p>";
                        }
                        if ($_GET["error"] == "Netacanmejl") {
                            echo "<p style='color:red;font-size: 20px;margin-top:10px'>Neispravan e-mail!</p>";
                        }
                        if ($_GET["error"] == "none") {
                            echo "<p style='color:black;font-size: 20px;margin-top:10px'>Poslali smo Vam e-mail za potvrdu!</p>";
                        }
                    }

                    ?>






                    <div class="dugme">
                        <input type="submit" name="submit" value="Dalje" class="btn">
                    </div>
                   




   


                </form>

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




    <script src="https://kit.fontawesome.com/75fcf8ab2f.js" crossorigin="anonymous">
    </script>
    <script src="registracija.js"></script>

</body>

</html>