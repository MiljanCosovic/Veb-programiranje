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
        <?php include 'profilAdmin.css';
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
                            echo "<li class='prijavaa' id='active'><a href='profilAdmin.php'>Profil</a></li>";
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
                    <a href='zahtevi.php'>
                        <div class="Zahtevi">
                            <p>Zahtevi</p>
                        </div>
                    </a>
                    <a href='dodajRaspored.php'>
                        <div class="dodajL">
                            <p>Dodaj raspored</p>
                        </div>
                    </a>
                    <a href='dodajNovostA.php'>
                        <div class="DodajN">
                            <p>Dodaj novost</p>
                        </div>
                    </a>
                    <a href='dodajLekara.php'>
                        <div class="dodajL">
                            <p>Dodaj lekara</p>
                        </div>
                    </a>

                    <a href='prikazLekara.php'>
                        <div class="dodajL">
                            <p>Prikaz Lekara</p>
                        </div>
                    </a>

                    <a href='prikazPacijenata.php'>
                        <div class="dodajL">
                            <p>Prikaz Pacijenata</p>
                        </div>
                    </a>
                    <a href='promenaSlikeA.php'>
                        <div class="dodajL">
                            <p>Promena profilne fotografije</p>
                        </div>
                    </a>

                    <a href='promenaSifre.php'>
                        <div class="dodajL">
                            <p>Promena sifre</p>
                        </div>
                    </a>

                </div>






            </div>
            <div class="desnii">

                <div class="personal">
                    <div class="licno">
                        <p>Licni podaci</p>
                    </div>
                    <div class="podaci">
                        <div class="podaciL">
                            <p>Ime</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT ime  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["ime"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>
                    <div class="podaci">
                        <div class="podaciL">
                            <p>Prezime</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT prezime  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["prezime"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Username</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT usern  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["usern"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Mesto Rodjenja</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT mestoRodjenja  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["mestoRodjenja"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Drzava Rodjenja</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT drzavaRodjenja  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["drzavaRodjenja"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>



                    <div class="podaci">
                        <div class="podaciL">
                            <p>Pol</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT pol  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["pol"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Datum Rodjenja</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT datumRodjenja  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["datumRodjenja"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>JMBG</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT maticni  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["maticni"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Broj Telefona</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT brojTelefona  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["brojTelefona"] . "</p>";
                            }
                            ?>
                        </div>

                    </div>


                    <div class="podaci">
                        <div class="podaciL">
                            <p>Email</p>
                        </div>
                        <div class="podaciD">
                            <?php
                            $oke = $_SESSION["userN"];
                            $sql = "SELECT mejl  FROM oke2 where usern= '$oke' ";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["mejl"] . "</p>";
                            }
                            ?>
                        </div>

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