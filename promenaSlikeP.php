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
        <?php include 'promenaSlike.css';
        include 'config.php';
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
                            echo "<li class='prijavaa'><a href='profilLekar.php'>ProfilLekar</a></li>";
                            echo "<li class='prijavaa' ><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "admin") {
                            echo "<li class='prijavaa' id='active'><a href='profilAdmin.php'>ProfilAdmin</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "pacijent") {
                            echo "<li class='prijavaa' id='active'><a href='profilPacijent.php'>ProfilPacinent</a></li>";
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
            <div class="levii">
                <div class="default">
                    <div class="slik">
                        <?php
                        $oke = $_SESSION["userN"];
                        $sql = "SELECT slika  FROM oke2 where usern= '$oke' ";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo " <img style='width:100%; height:100%; border-radius:50%;' src='" . $row["slika"] . "'>";
                        }
                        ?>
                    </div>
                    <?php
                    $oke = $_SESSION["userN"];
                    $sql = "SELECT ime,prezime  FROM oke2 where usern= '$oke' ";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<p style='margin-top:10px; font-size:25px;'>" . $row["ime"] . " " . $row["prezime"] . "</p>";
                    }



                    ?>

                </div>

                <div class="informacije">
                    <a href='zakaziPregled.php'>
                        <div class="Zahtevi">
                            <p>Zakazite pregled</p>
                        </div>
                    </a>
                    <a href='promenaLekara.php'>
                        <div class="DodajN">
                            <p>Promena izabranog lekara</p>
                        </div>
                    </a>
                    <a href='karton.php'>
                        <div class="dodajL">
                            <p>Karton</p>
                        </div>
                    </a>
                    <a id="activee" href='promenaSlikeP.php'>
                        <div class="dodajL">
                            <p>Promena profilne fotografije</p>
                        </div>
                    </a>

                    <a href='promenaSifreP.php'>
                        <div class="dodajL">
                            <p>Promena sifre</p>
                        </div>
                    </a>

                </div>






            </div>
            <div class="desnii">


                <div class="dContent">
                    <p class="teksst">Promena profilne fotografije</p>

                    <form action="initSlikaP.php" method="POST" enctype="multipart/form-data">

                        <label class="adr">Izaberite fotografiju</label>
                        <input class="custom-file-input" type="file" name="file" required>


                       
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "stmtfailed") {
                                echo "<p style='color:red;font-size: 20px;margin-top:10px'>Neuspesno menjanje profilne fotografije</p>";
                            }

                            if ($_GET["error"] == "none") {
                                echo "<p style='color:black;font-size: 20px;margin-top:10px'>Uspesno ste promenili profilnu fotografiju!</p>";
                            }
                        }

                        ?>


                        <div class="dugme">
                            <input type="submit" name="submitt" value="Promeni fotografiju " class="btn">
                        </div>






                    </form>



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






    </div>



    <script src="promena.js"></script>

</body>

</html>