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
        <?php include 'dodajLekara.css';
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
                            echo "<li class='prijavaa'><a href='profilPacijent.php'>ProfilPacinent</a></li>";
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
                                echo " <img style='width:100%; height:100%; border-radius:50%;' src='".$row["slika"]."'>";
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
                    <a href='dodajNovostA.php'>
                        <div class="DodajN">
                            <p>Dodaj novost</p>
                        </div>
                    </a>
                    <a href='dodajLekara.php'>
                        <div id='activee' class="dodajL">
                            <p>Dodaj lekara</p>
                        </div>
                    </a>

                </div>
            </div>


            <div class="desnii">
                <div class="dContent">
                    <div class="DodajLek">
                        <p>Dodaj Lekara</p>
                    </div>


                    <div class="reg">
                        <form action="initLekar.php" method="POST">

                            <div class="rr">
                                <div class="frm">
                                    <div class="Ime2">
                                        <label for="">Ime:</label>
                                    </div>
                                    <div class="ime">
                                        <div class="ikon"><i class="fa-solid fa-file-signature"></i></div>
                                        <div class="input"><input class="im" type="text" name="ime" placeholder="Uneti ime:" required></div>
                                    </div>
                                </div>

                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Prezime:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-file-signature"></i></div>
                                        <div class="input"><input class="im" type="text" name="prezime" placeholder="Uneti prezime:" required></div>
                                    </div>


                                </div>

                            </div>


                            <div class="rr">
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Mesto rođenja:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-city"></i></div>
                                        <div class="input"><input class="im" type="text" name="mestoRodjenja" placeholder="Uneti mesto rođenja:" required></div>
                                    </div>

                                </div>

                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Drzava rođenja:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-flag"></i></div>
                                        <div class="input"><input class="im" type="text" name="drzavaRodjenja" placeholder="Uneti državu rođenja:" required></div>
                                    </div>

                                </div>
                            </div>


                            <div class="rr">
                                <div class="oo">
                                    <div class="Prezime2">
                                        <label for="">Pol:</label>
                                    </div>
                                    <div class="Pol2">
                                        <div class="pol">
                                            <div class="Muski">
                                                <p>Muski:</p><input style="height:17px; width:17px;" type="radio" name="pol" value="m">
                                            </div>
                                            <div class="Zenski">
                                                <p>Zenski:</p><input style="height:17px; width:17px;" type="radio" name="pol" value="z">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Datum rođenja:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-calendar-days"></i></i></div>
                                        <div class="input"><input class="im" type="date" name="datumRodjenja" required></div>
                                    </div>
                                </div>
                            </div>

                            <div class="rr">
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">JMBG:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-key"></i></div>
                                        <div class="input"><input class="im" type="text" name="maticni" placeholder="Uneti JMBG:" required></div>
                                    </div>
                                </div>
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Broj mobilnog telefona:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-phone"></i></div>
                                        <div class="input"><input class="im" type="text" name="brojTelefona" placeholder="Uneti broj mobilnog telefona:" required></div>
                                    </div>
                                </div>
                            </div>

                            <div class="rr">
                                <div class="frm">

                                    <div class="Prezime2">
                                        <label for="">E-mail:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-envelope"></i></div>
                                        <div class="input"><input class="im" type="email" name="email" placeholder="Uneti E-mail:" required></div>
                                    </div>


                                </div>
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Username:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-file-signature"></i></div>
                                        <div class="input"><input class="im" type="text" name="usernameeee" placeholder="Uneti username:" required></div>
                                    </div>
                                </div>
                            </div>

                            <div class="rr">
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Lozinka:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-lock"></i></div>
                                        <div class="input"><input id="lozinka" class="im" type="password" name="lozinka" placeholder="Uneti lozinku:" required></div>
                                    </div>
                                </div>
                                <div class="frm">
                                    <div class="Prezime2">
                                        <label for="">Potvrda lozinke:</label>
                                    </div>
                                    <div class="prezime">
                                        <div class="ikon"><i class="fa-solid fa-lock"></i></div>
                                        <div class="input"><input id="potvrdaLozinke" class="im" type="password" name="potvrdaLozinke" placeholder="Uneti istu lozinku:" required>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="rr">
                                <div class="frm">
                                    <div class="cek">
                                        <input class="cekbok" type="checkbox" onclick="showPasswords()">
                                        <p style="font-size: 20px;">Prikaz lozinke</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dugmeee">
                                <div class="dugme">
                                    <input type="submit" name="submitt" value="Dodaj Lekara " class="btn">
                                </div>


                            </div>





                        </form>

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




    </div>




    <script src="https://kit.fontawesome.com/75fcf8ab2f.js" crossorigin="anonymous">
    </script>
    <script src="registracija.js">
    </script>

</body>

</html>