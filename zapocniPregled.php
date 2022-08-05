<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'zapocniPregled.css';
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
                            echo "<li class='prijavaa' id='active'><a href='profilLekar.php'>ProfilLekar</a></li>";
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
                    <a id='activee' href='pregledi.php'>
                        <div class="Zahtevi">
                            <p>Pregledi</p>
                        </div>
                    </a>
                    <a href='rasporedRada.php'>
                        <div class="DodajN">
                            <p>Raspored rada</p>
                        </div>
                    </a>
                    <a href='dodajNovosL.php'>
                        <div class="dodajL">
                            <p>Dodaj novost</p>
                        </div>
                    </a>
                    <a href='dodajTermin.php'>
                        <div class="dodajL">
                            <p>Dodaj termine za pregled</p>
                        </div>
                    </a>


                    <a href='promenaSifreL.php'>
                        <div class="dodajL">
                            <p>Promena sifre</p>
                        </div>
                    </a>

                </div>
            </div>


            <div class="desnii">
                <div class="dContent">
                    
                    <?php
                    
                    $kljuc = isset($_GET['varname']) ? $_GET['varname']: '' ;
                    
                    $sql = "SELECT * FROM oke2 WHERE maticni='$kljuc' ";
                    $result = $conn->query($sql);
    
                        while($row = $result->fetch_assoc())
                        {   
                            echo"<p class='teksst'>Pregled za pacijenta  " . $row["ime"] ."  " . $row["prezime"] . "</p>";
                        }
                    
                

                    ?>


                    <form action="initZapocniPregled.php" method="POST">

                        <label class="adr">Dijagnoza:</label>
                        <input class="ad" id="dijagnoza" type="text" name="dijagnoza" placeholder="Uneti dijagnozu" required>


                        <label class="adre">Anamneza:</label>
                        <input class="ad" id="anamneza" type="text" name="anamneza" placeholder="Uneti anamnezu" required>


                        <label class="adre">Status:</label>
                        <input class="ad" type="text" name="status" placeholder="Uneti status" id="status" required>

                        <label class="adre">Terapija:</label>
                        <input class="ad" type="text" name="terapija" placeholder="Uneti terapiju" id="terapija" required>

                        <label class="adre">Napomena:</label>
                        <input class="ad" type="text" name="napomena" placeholder="Uneti napomenu" id="napomena" required>
                        <?php
                        
                         $kljucM = isset($_GET['varname']) ? $_GET['varname']: '' ;
                        echo" <input type='hidden' name='varname' value='$kljucM'>";
                        

                        ?>

                        

                       

                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "neuspesnoObavljenPregled") {
                                echo "<p style='color:red;font-size: 20px;margin-top:10px'>Neuspesno obavljen pregled!</p>";
                            }
                            
                            if ($_GET["error"] == "pregledObavlejn") {
                                echo "<p style='color:black;font-size: 20px;margin-top:10px'>Uspesno ste obavili pregled!!</p>";
                            }
                        }

                        ?>




                        <div class="dugme">
                            <input type="submit" name="submitt" value="Obavi pregled " class="btn">
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




</body>

</html>