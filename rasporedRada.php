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
</head>
<style>
    <?php include 'rasporedRada.css';
    include 'config.php';  ?>
</style>

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
                            echo "<li class='prijavaa' id='active'><a href='profilLekar.php'>Profil</a></li>";
                            echo "<li class='prijavaa' ><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "admin") {
                            echo "<li class='prijavaa' id='active'><a href='profilAdmin.php'>Profil</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                        } else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "pacijent") {
                            echo "<li class='prijavaa' id='active'><a href='profilPacijent.php'>Profil</a></li>";
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
                    <a href='pregledi.php'>
                        <div class="Zahtevi">
                            <p>Pregledi</p>
                        </div>
                    </a>
                    <a href='rasporedRada.php'>
                        <div id="activee" class="DodajN">
                            <p>Raspored rada</p>
                        </div>
                    </a>
                    <a href='dodajNovosL.php'>
                        <div class="dodajL">
                            <p>Dodaj novost</p>
                        </div>
                    </a>
                    <a href='prikazPacijenataL.php'>
                        <div class="dodajL">
                            <p>Prikaz pacijenata</p>
                        </div>
                    </a>
                    <a href='dodajTermin.php'>
                        <div class="dodajL">
                            <p>Dodaj termine za pregled</p>
                        </div>
                    </a>
                    <a href='promenaSlikeL.php'>
                        <div class="dodajL">
                            <p>Promena profilne fotografije</p>
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

                <div class="personal">
                    <div class="licno">
                        <p>Prikaz rasporeda rada lekara</p>
                    </div>

                    <div class="tabela">

                        <?php
                         $oke = $_SESSION["userN"];
                         $ddDatum = date("Y-m-d");
                         $sqll = "SELECT ime,prezime  FROM oke2 where usern= '$oke' ";
                         $resultt = $conn->query($sqll); 
                         $row = $resultt->fetch_assoc();

                         
                         
                         $lekar=$row["ime"]. " " .$row["prezime"];
                         
                         
                         
                         $sql = "SELECT * FROM raspored where Lekar = '$lekar' AND datum>='$ddDatum' order by datum";
                         $result = $conn->query($sql);
                         
                         if ($result->num_rows > 0) {
                          
                            echo "<ul class='responsive-table'>
                            <li class='table-header'>
                              <div class='col col-1'>Lekar</div>
                              <div class='col col-2'>Datum</div>
                              <div class='col col-3'>Smena</div>
                            </li>";
                            while($row = $result->fetch_assoc()) {
                            
                            echo"<ul class='responsive-table'>
                            <li class='table-row'>
                            <div class='col col-1' data-label='Job Id'>".$row["Lekar"]."</div>
                            <div class='col col-2' data-label='Customer Name'>".$row["datum"]."</div>
                            <div class='col col-3' data-label='Amount'>".$row["smena"]."</div>
                          </li>
                          </ul>";
                        }
                    }
                 else {
                    echo "<p style='margin-top:50px; font-size:25px;margin-bottom:30px,float:left;'>Jos nije izasao raspored!</p>";
                    
                }
            
                        $conn->close();
                        ?>

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