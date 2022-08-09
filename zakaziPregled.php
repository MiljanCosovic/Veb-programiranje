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
        <?php include 'zakaziPregled.css';
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
                    <a id="activee" href='zakaziPregled.php'>
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
                    <a href='promenaSlikeP.php'>
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
                    <p class="teksst">Zakazite pregled</p>
                    <?php
                    $ddDatum = date("Y-m-d");
                    $okee = $_SESSION["userN"];
                    $sqllll = "SELECT ime,prezime  FROM oke2 where usern= '$okee' ";
                    $resultttt = $conn->query($sqllll);
                    if ($resultttt->num_rows > 0) {
                          $row = $resultttt->fetch_assoc();
                        
                    $pacijentt = $row["ime"] . " " . $row["prezime"];
                

                    $sqlll = "SELECT vreme,oke FROM rezervacije WHERE pacijent='$pacijentt' AND Termin='rezervisan' AND oke>='$ddDatum' order by oke";
                    $resulttt = $conn->query($sqlll);
                    
                    if ($resulttt->num_rows > 0) {
                        
                        echo "<p style='font-size: 28px;margin-top:50px;margin-bottom:10px'>Vasi zakazni pregledi:</p>";
                            while ($row = $resulttt->fetch_assoc()) {
                                echo "<p style='font-size: 20px;margin-top:5px'>Imate zakazan pregled za: ".$row["oke"]." od ".$row["vreme"]."h</p>";
                            }
                        } else {
                            echo "<p style='font-size: 20px;margin-top:15px'>Jos nemate zakazanih pregleda!</p>";
                        }
                    }
                  
                    

                    ?>




                    <form action="initZakaziPregled.php" method="POST">
                        <?php
                        
                        $date=date("Y-m-d");
                        $korisnickoIme=$_SESSION["userN"];
                        $sql = "SELECT izabraniLekar FROM oke2 WHERE usern='$korisnickoIme'";
                        $result = $conn->query($sql);
        
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $lekar = $row['izabraniLekar'];
                            $sqll = "SELECT datum, vreme FROM rezervacije WHERE lekar='$lekar' AND Termin='slobodan' AND oke>='$date' order by oke";
                            $resultt = $conn->query($sqll);
                            if ($resultt->num_rows > 0) {
                                
                            echo "<br><label class='adr' for='termin'><b>Slobodni termini za Vaseg izabranog lekara:</b></label><br><br>                       
                                <select  style='text-align:center;font-size:15px;' class='ad' id='termin' name='termin' required>";
                            while($row = $resultt->fetch_assoc())
                            {   
                                echo"<option value='".$row['datum']." ".$row['vreme']."'>".$row['datum']." ".$row['vreme']."</option>";
                            }
                            echo "</select>";
                        } else {
                            echo "Lekar jos nema slobodne termine!";
                        }
                    }
                        $conn->close();
                        ?>


                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "erorr") {
                                echo "<p style='color:red;font-size: 20px;margin-top:10px'>Neuspesno zakazivanje pregleda</p>";
                            }
                            if ($_GET["error"] == "postoji") {
                                echo "<p style='color:red;font-size: 20px;margin-top:10px'>Tog dana vec imate zakazan termin!</p>";
                            }
                            if ($_GET["error"] == "none") {
                                echo "<p style='color:black;font-size: 20px;margin-top:10px'>Uspesno ste zakazali pregled!</p>";
                            }
                        }

                        ?>




                        <div class="dugme">
                            <input type="submit" name="submitt" value="Zakazite pregled" class="btn">
                        </div>






                    </form>





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