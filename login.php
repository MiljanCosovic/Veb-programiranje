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
    <style><?php include 'login.css' ?><?php include 'registracija.js' ?></style>
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
                        <li class="usluge"><a href="">Usluge</a></li>
                        <li class="simptomi" ><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="">Osoblje</a></li>
                        <li class="contact"><a href="">Kontak</a></li>
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
                <h1>Prijavi se</h1>



                <form action="initPrijava.php" method="POST">

                <div class="Ime2">
                        <label for="">Username:</label>
                    </div>
                    <div class="ime">
                        <div class="ikon"><i class="fa-solid fa-file-signature"></i></div>
                        <div class="input"><input class="im" type="text" name="usernameeee" placeholder="Uneti Username:" required></div>
                    </div>

                    <div class="Prezime2">
                        <label for="">Lozinka:</label>
                    </div>
                    <div class="prezime">
                        <div class="ikon"><i class="fa-solid fa-lock"></i></div>
                        <div class="input"><input id="lozinka" class="im" type="password" name="lozinka" placeholder="Uneti Lozinku:" required></div>
                    </div>

                    <div class="cek">
                        <input class="cekbok" type="checkbox" onclick="showPasswords()">
                        <p style="font-size: 20px;">Prikaz lozinku</p>
                    </div>
                    <div class="dugme">
                        <input type="submit" name="submit" value="Prijavi se" class="btn">
                    </div>
                    <div class="prijavi">
                        <p>Nemate nalog?</p>
                        <p><a href="registracija.php">Registrujte se</a></p>
                    </div>




                <?php  
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "NetacnaLozinka")
                        {
                            echo "<p>Netacna Lozinka</p>";
                        }
                    }
                    

                 ?>


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
    <script src="registracija.js"></script>

</body>

</html>