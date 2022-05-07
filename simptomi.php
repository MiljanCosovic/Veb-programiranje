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
        <?php include 'simptomi.css' ?>
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
                        <li class="usluge"><a href="">Novosti</a></li>
                        <li class="simptomi" id="active"><a href="simptomi.php">Simptomi</a></li>
                        <li class="osoblje"><a href="">Osoblje</a></li>
                        <li class="contact"><a href="kontakt.php">Kontak</a></li>
                        
                        <?php
                        if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "lekar") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilLekar</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                            
                        }
                        else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "admin") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilAdmin</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                            
                        }

                       else if (isset($_SESSION["userN"]) && ($_SESSION["TipU"]) == "pacijent") {
                            echo "<li class='prijavaa'><a href='profile.php'>ProfilPacinent</a></li>";
                            echo "<li class='prijavaa'><a href='logout.php'>Log Out</a></li>";
                            
                        }
                        
                        else {
                            echo "<li class='prijavaa'><a href='login.php'>Prijavi se</a></li>";
                        }

                        ?>
                    </ul>
                    <label for="check" onclick="openMenu()">
                        <i id="hamburger" class="fas fa-bars"></i>
                    </label>
                </div>
            </div>

            <div class="simptom">
                <p>Simptomi
                <p>
            </div>

            <div class="main">

                <div class="main_simptom">
                    <img src="slike/simptomi.jpg">
                    <p class="tekst1">Simptomi koji su pobrojani na ovoj stranici ni u kojem slučaju ne
                        predstavljaju potpunu listu simptoma koji su u vezi sa glavoboljama ili
                        sa uslugama koje ordinacija MediHelp pruža. Ideja ove stranice je da pruži
                        sistematizaciju sadržaja dostupnog na sajtu i jednostavnije snalaženje.</p>

                    <p class="tekst2">Postavljanje dijagnoze je proces koji uključuje preglede doktora specijalista iz raznih
                        grana medicine, koje u našoj ordinaciji obavljaju eminentni doktori različitih specijalnosti.
                        Po potrebi, to može da uključi i određene dijagnostičke procedure. Tek nakon toga moguće je
                        dijagnostifikovati i diferencirati potencijalno ozbiljne uzročnike simptoma, a nakon toga primeniti
                        savremene terapijske procedure u lečenju oboljenja koja ih izazivaju.</p>



                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>


                    <h2>Bol u glavi</h2>
                    <ul>
                        <li>pulsiranje u glavi – može biti simptom: migrene, glavobolje pripisane 
                            feohromocitomu, glavobolje izazvane alkoholom, glavobolje usled arterijske 
                            hipertenzije, glavobolje kod temporalnog arteritisa, … kao i mnogih drugih.</li>
                        <li>bol glave na dodir – može biti simptom: tenzione glavobolje, numularne glavobolje, 
                            povišenog tonusa mišića poglavine, povrede tkiva poglavine, zapaljenskih ili drugih 
                            patoloških procesa tkiva poglavine, … kao i mnogih drugih.</li>
                        <li>bol u vilici i glavi – može biti simptom: Temporomandibularne disfunkcije 
                            (distorzije ili disfunkcije zgloba donje vilice), zapaljenja sinusa, bolesti 
                            zuba, bolesti oka, trigeminalne neuralgije, postherpetičke neuralgije, 
                            okcipitalne neuralgije, disekcije karotidne arterije, … kao i mnogih drugih.</li>
                        <li>bol u temenu glave – može biti simptom: tenzione glavobolje, arterijske hipertenzije, 
                            dugotrajnog prinudnog položaja glave i vrata …. kao i mnogih drugih.</li>
                        <li>bol u potiljku – može biti simptom: arterijske hipertenzije, tenzione glavobolje, 
                            okcipitalne neuralgije, cervikogene glavobolje, degenerativnih bolesti vratne kičme uključujući i 
                            diskus hernije vratnih pršljenova, … kao i mnogih drugih.</li>
                        <li>pritisak u potiljku – može biti simptom: arterijske hipertenzije, tenzione 
                            glavobolje, glavobolje kod benigne intrakranijalne hipertenzije, povišenog 
                            tonusa vratne muskulature i muskulature poglavine, … kao i mnogih drugih.</li>
                    </ul>

                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>

                    <h2>Glavobolje</h2>
                    <ul>
                        <li>česta glavobolja – može biti simptom: migrene, tenzionih glavobolja, klaster glavobolja, 
                            hroničnih glavobolja, glavobolja prekomerne upotrebe analgetika, cervikogene glavobolje, 
                            glavobolja kod tumora mozga, arterijske hipertenzije, dužeg prinudnog položaja glave i vrata, 
                            bolesti oka, kod poremećaja vida, zapaljenja sinusa, … kao i mnogih drugih.</li>
                        <li>glavobolja posle spavanja – može biti simptom: apneja u toku sna (sleep apnea), nefizioloških položaja 
                            vrata i glave u toku sna, migrene, tumora mozga, napetosti mišića vrata, … kao i mnogih drugih.</li>
                        <li>bol u glavi prilikom kašlja – može biti simptom: povišenog intrakranijalnog pritiska, tumora zadnje 
                            lobanjske jame, hroničnog subduralnog hematoma, zapaljenja sinusa, Arnold-Chiari-eva malformacija, … kao 
                            i mnogih drugih.</li>
                        <li>glavobolja od hladnoće – može biti simptom: udisanja hladnog vazduha, izlaganja nezaštićenih delova 
                            glave hladnoći i konzumiranju hladne hrane, … kao i mnogih drugih.</li>
                        <li>buđenje sa glavoboljom – može biti simptom: apneja u spavanju, neprirodnog položaja glave i vrata u 
                            spavanju, konzumiranja alkohola, arterijske hipertenzije, tumora mozga, zapaljenja sinusa, klaster 
                            glavobolja, migrene, … kao i mnogih drugih.</li>
                        <li>glavobolja od gladi može biti provocirana: hipoglikemijom, migrenom, provocirana gladovanjem, … 
                            kao i mnogih drugih.</li>
                        <li>glavobolja pred menstruaciju – može biti simptom: migrene, … kao i mnogih drugih.</li>


                    </ul>

                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>


                    <h2>Vrtoglavica</h2>
                    <ul>
                        <li>vrtoglavica – može biti simptom: poremećaja centra za ravnotežu, oštećenja perifernog čula za 
                            ravnotežu, zapaljenja srednjeg uva, Menijerove bolesti, migrene, poremećaja moždane cirkulacije, 
                            dugotrajnog prinudnog položaja vrata i glave, arterijske hipotenzije, arterijske hipertenzije, 
                            hipoglikemije, anemije, tumora zadnje lobanjske jame, multiple skleroze, … kao i mnogih drugih.</li>
                        <li>vrtoglavica i mučnina – može biti simptom: poremećaja centra za ravnotežu, zapaljenskih promena srednjeg i 
                            unutrašnjeg uva, Menijerove bolesti, neuritisa vestibularnog nerva, arterijske hipertenzije, moždanog 
                            udara u malom mozgu, moždanog udara u moždanom stablu, multiple skleroze, … kao i mnogih drugih.</li>
                        <li>gubitak ravnoteže – može biti simptom: poremećaja centra za ravnotežu, poremećaja moždane cirkulacije, moždanog udara, 
                            tumora mozga, Menijerove bolesti, oštećenja perifernog nervnog sistema, multiple skleroze, … kao i 
                            mnogih drugih.</li>
                        <li>vrtoglavica pri okretanju glave – može biti simptom: poremećaja centra za ravnotežu, bolesti vratnog dela
                             kičmenog stuba, napetosti mišića vratne kičme, bolesti unutrašnjeg uva, … kao i mnogih drugih.</li>
                        <li>vrtoglavica, nestabilnost pri hodu, nemogućnost stajanja i hoda – može biti simptom: poremećaja moždane cirkulacije – 
                            vertebro-bazilarne insuficijencije, moždanog udara u zadnjoj lobanjskoj jami, tumora mozga u zadnjoj
                             lobanjskoj jami, poremećaja centra za ravnotežu, … kao i mnogih drugih.</li>
                    </ul>

                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>

                    <h2>Gubitak svesti</h2>
                    <ul>
                        <li>gubitak svesti – može biti simptom: kolapsa ili sinkope, epilepsije, arterijske hipotenzije, kardioloških oboljenja 
                            (hipotenzija, poremećaj srčanog ritma), intenzivnih emocija, bola, poremećaja moždane cirkulacije, … 
                            kao i mnogih drugih.</li>
                        <li>nesvestica – može biti simptom: hipoglikemije, stanja pre kolapsa ili sinkope, arterijske 
                            hipotenzije, arterijske hipertenzije, … kao i mnogih drugih.</li>
                    </ul>

                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>


                    <h2>Poremećaji ponašanja i pamćenja</h2>

                    <ul>
                        <li>česte promene raspoloženja – može biti simptom: Alchajmerove demencije, vaskularne demencije, hipoglikemije, hipotireoze, 
                            toksičnih stanja, neuroloških, sistemskih i infektivnih oboljenja, … kao i mnogih drugih.</li>
                        <li>depresija – može biti simptom: različitih demencija, kao i zasebno oboljenje, … kao i mnogih drugih.</li>
                        <li>zaboravljanje skorašnjih događaja – može biti simptom: svih oblika demencija, naročito multiinfarktne (vaskularne) demencije, 
                            zapaljenja krvnih sudova mozga (vaskulitisa), sistemskih oboljenja, metaboličkih poremećaja, hipoglikemije, … kao i 
                            mnogih drugih.</li>
                        <li>otežano nalaženje reči – može biti simptom: demencije, bolesti krvnih sudova mozga, moždanog udara, poremećaja govora, endokrinoloških 
                            poremećaja (tireoidnog, paratireoidnog, hipofiznog, nadbubrežnog, jetrinog, plućnog, pankreasnog, bubrežnog, hematološkog poremećaja), … 
                            kao i mnogih drugih.</li>
                        <li>problemi u snalaženju u prostoru – može biti simptom: demencije svih tipova, naročito Alchajmerove demencije, Difuzne bolesti levijevih tela, 
                            Pikove demencije (bolesti), Multisistemske atrofije, Demencije frontalnih režnjeva, … kao i mnogih drugih.</li>

                        <li>teškoće u izvršavanju poznatih zadataka i rutinskih radnji – može biti simptom: demencije, tumora mozga, epilepsije, encefalopatije u 
                            sklopu borelije (Lajmske bolesti), neurosarkoidoze, … kao i mnogih drugih.</li>
                        <li>povlačenje iz društvenog života – može biti simptom: depresije, psihijatrijskih oboljenja, demencije, Parkinsonove bolesti, Binsvangerove bolesti, 
                            Kortiko-bazalna ganglionska degeneracija, Progresivna supranuklearna paraliza, normotenzivni 
                            hidrocefalus, … kao i mnogih drugih.</li>
                        <li>promene raspoloženja i ponašanja – može biti simptom: psihijatrijskih oboljenja, tumora mozga, Jakob – Krojcfeldove bolesti, HIV infekcije, deficijencije 
                            vitamina B12, hipotireoze, … kao i mnogih drugih.</li>
                        <li>promene ličnosti – može biti simptom: psihijatrijskih oboljenja, alkoholne demencije, metaboličkih poremećaja, Alchajmerove bolesti, vaskularnih demencija, 
                            stanja nakon moždanog udara, tumora mozga, … kao i mnogih drugih.</li>
                        <li>smetnje ili nemogućnost govora – može biti simptom: poremećaja moždane cirkulacije, moždanog udara tipa moždanog krvarenja, infarkta mozga, tumora mozga, … 
                            kao i mnogih drugih</li>
                        <li>Smetnje čitanja, računanja, imenovanja predmeta – može biti simptom: demencije, stanja nakon moždanog udara, poremećaja moždane cirkulacije, … kao 
                            i mnogih drugih</li>

                        <li>izmena ponašanja – može biti simptom: psihijatrijskih oboljenja, stanja nakon moždanog udara, tumora mozga, Jakob – Krojcfeldove bolesti, HIV infekcije, deficijencije 
                            vitamina B12, hipotireoze, … kao i mnogih drugih</li>
                    </ul>

                    <div class="wrapper">
                        <a href=""><span>Zakažite pregled</span></a>
                    </div>



                    
                </div>





            </div>





            <div class="footer">







<div class="medi">
    <h2 style="font-family: sans-serif;color: white">MEDIHELP</h2>
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
<p>© 2022, Neurologija Medihelp | Novi Pazar</p>
</div>






        </div>

</body>

</html>