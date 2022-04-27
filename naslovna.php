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
        <?php include 'naslovna.css' ?>
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
                        <li class="naslovna" id="active"><a href="naslovna.php">Početna</a></li>
                        <li class="usluge"><a href="">Usluge</a></li>
                        <li class="simptomi"><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="">Osoblje</a></li>
                        <li class="contact"><a href="">Kontak</a></li>
                              
                        
                        <?php
                        if (isset($_SESSION["userN"])) {
                            echo "<li class='prijavaa'><a href='profile.php'>Profil</a></li>";
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

            


            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="slike/neurologija2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="slike/neurologija3.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="slike/neurologija5.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="slike/farmakologija.jpg" style="width:100%">
                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>

          

            <div class="main">

                <div class="tekst">
                    <div class="slika">
                        <img src="slike/neurologija.jpg" alt="">
                    </div>
                    <div class="tekst1  ">
                        <h1 style="color: orangered">Neurologija</h1>
                        <p>Neurologija je grana medicine koja izučava poremećaje nervnog sistema. Ona se bavi ispitivanjem i pregledom
                            neuroloških pacijenata, obavljanjem dijagnostičkih procedura, postavljanjem dijagnoze i lečenjem bolesti mozga,
                            kičmene moždine, nerava, mišića i u toj oblasti orijentisanim krvnim sudovima.</p>



                        <p>Neurolog pregleda pacijenta čiji simptomi sugerišu na različita neurološka oboljenja, kao što su na primer glavobolje,
                            šlog, demencija (alchajmerova bolest), epilepsija, Parkinsonova bolest, neuropatija, mijastenija gravis, multipla skleroza,
                            te brojne druge neurološke poremećaje od kojih pacijenti boluju.</p>

                        <p>Neurologija je nehirurška grana medicine, ali njena odgovarajuća hirurška specijalnost je neurohirurgija.</p>

                    </div>
                </div>



                <div class="tekst">
                    <div class="tekst1  ">
                        <h1 style="color: orangered">Neurološki pregled</h1>
                        <p>Sam neurološki pregled koga obavlja neurolog je osnova neurologije i podrazumeva bezbolno ispitivanje nerava glave (kranijalnih nerava),
                            vida, snage i napetosti telesnih mišića, refleksa, stabilnost pri stajanju i hodu, preciznosti pokreta, senzibiliteta, govora, kao i psihičkog stanja
                            pacijenta u smislu pamćenja, rasuđivanja i orijentacije. Postavljanje dijagnoze je nekada moguće postaviti i samo na osnovu ovakvog detaljnog, i često
                            za pacijente «neobičnog» pregleda.</p>

                        <div class="wrapper">
                            <a href=""><span>Zakažite pregled</span></a>
                        </div>

                    </div>

                    <div class="slika2">
                        <img src="slike/pregled.jpg" alt="">
                    </div>
                </div>



                <div class="tekst">
                    <div class="slika">
                        <img src="slike/metode.jpeg" alt="">
                    </div>
                    <div class="tekst1  ">
                        <h1 style="color: orangered"> Dijagnostičke metode koje pomažu neurologu</h1>
                        <p>Na osnovu ishoda ovoga pregleda, neurolog može da zahteva dodatno istraživanje uključujući mnogobrojne druge testove: specifično laboratorijsko,
                            a nekada i genetskog istraživanje, analiza tečnosti (likvora) dobijene punkcijom iz kičmenog kanala; ultrazvuk krvnih sudova glave i vrata,
                            elektroencefalografiju, elektromioneurografiju, procedure neuroslikanja (CT i NMR), itd. Podaci dobijeni na ovaj način pomažu neurologu da
                            postavi ispravnu dijagnozu i omogući pacijentu ispravno lečenje.</p>
                        <p>Često će neurolog izvesti lumbarne punkture kako bi imao pristup karakterističnosti cerebrospinalne tečnosti. Usavršavanje genetskih
                            testiranja postalo je veoma bitno sredstvo u klasifikaciji naslednih neuromuskularnih bolesti.</p>

                    </div>
                </div>




                <div class="tekst">
                    <div class="tekst1  ">
                        <h1 style="color: orangered">Neurolozi sa različitim stručnim usmerenjima</h1>
                        <p>Kao posledica velikog broja neuroloških oboljenja, kao i kompleksnosti ove specijalnosti, u našoj zemlji, kao i širom sveta neurolozi se uže stručno
                            usavršavaju u različitim oblastima neurologije i njima se više i bave: oblasti glavobolja, moždanog udara, neurodegenerativnih oboljenja – demencija;
                            ekstrapiramidnih bolesti, neuromišićnih oboljenja … U tom smislu, neurolozi prolaze i kroz specijalne obuke u primeni i analizi rezultata različitih
                            dijagnostičkih procedura iz oblasti neuroangiologije (dopler krvnih sudova), neuroelektrofiziologije (EEG, EMG, EP), neurohirurške intraoperativne primene
                            evociranih potencijala…</p>
                    </div>

                    <div class="slika2">
                        <img src="slike/neurolozi.jpg" alt="">
                    </div>
                </div>


                <div class="tekst">
                    <div class="slika">
                        <img src="slike/trauma.jpg" alt="">
                    </div>
                    <div class="tekst1  ">
                        <h1 style="color: orangered">Preklapanje neurologije sa drugim oblastima</h1>
                        <p>Neurologija se preklapa sa nekim drugim specijalnostima, na primer, akutna trauma glave se najčešće leči od strane neurohirurga,
                            ali je često udružena sa lečenjem od strane neurologa i specijaliste fizikalne medicine. Pacijente obolele od moždanog udara leče neurolozi,
                            ali je teško sagledati pacijente bez pomoći lekara internističkih specijalnosti, koji neretko bivaju, u različitim svetskim centrima, i primarni
                            lekari u ovoj oblasti.</p>

                        <p>Ispitivanje kliničkih neuropsihologa je često neophodno u proceni intelektualnih i drugih psiholoških potencijala obolelih, što neurolozima olakšava
                            postavljanje dijagnoze i strategije u daljem lečenju i rehabilitaciji na taj način ispitivanih pacijenata: Ti pacijenti najčešće boluju od demencije.</p>

                        <div class="wrapper">
                            <a href=""><span>Zakažite pregled</span></a>
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















        <script>
            var slideIndex = 0;
            showSlides();

            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 4000); // Change image every 2 seconds
            }

            function openMenu() {
                var ulList = document.getElementById('menuHeader')
                ulList.classList.toggle("mobileScreen")
            }
        </script>
</body>

</html>