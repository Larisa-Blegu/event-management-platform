
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>Make-Up de seara </title> 
                <link rel='stylesheet' type='text/css' href='../despre.css'>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>Amiral Events</p>
                    <p id='data'>2024-02-08 08:00:00</p></div>
                <h1>Make-Up de seara </h1>
                <h2>~Editia 2023-2024~</h2>
                <div class='topnav'>
                    <a href='agenda.php'> Agenda</a>
                    <a href='speakers.php'>Speakers</a>
                    <a href='sponsori_parteneri.php'>Parteneri & Sponsori</a>
                    <a href='contact_locatie.php'>Contact & Locatie</a>
                    <a href='bilet.php'>Bilete</a>
                    <form action=""method="post">
                    <br>
                    </form>
                </div><br>
                <p>
Bine ați venit la Masterclass-ul nostru de Machiaj de Seară, o experiență captivantă destinată să vă transforme abilitățile de machiaj pentru a crea look-uri elegante și sofisticate. În cadrul acestui curs avansat, vă vom ghida prin tehnici rafinate de machiaj adaptate pentru serile speciale. Vom explora arta sculptării feței, conturarea și iluminarea strategică pentru a evidenția trăsăturile frumos. Cursul acoperă tehnici de machiaj pentru ochi, inclusiv smokey eyes și machiaj cat-eye, aducând profunzime și mister privirii dvs. Vom aborda culorile și texturile potrivite pentru a obține un machiaj de seară impecabil. Veți învăța să aplicați corect rujuri de lungă durată și să obțineți o finisare profesională care rezistă întreaga seară. Cu sfaturi și trucuri de la profesioniști în domeniu, acest masterclass vă va oferi instrumentele necesare pentru a vă exprima frumusețea într-un mod spectaculos. În final, veți primi un certificat de absolvire, validând competențele dobândite și pregătindu-vă pentru a străluci la orice eveniment de seară. Înscrieți-vă acum și descoperiți tainele unui machiaj de seară impecabil!</p>
                <br> <br> <br>
                <p><img src = '../poza_generala4.jpg'></p>
                <?php
                
                if (isset($_POST['buton_apelare'])) {
                    session_destroy();
                    echo "Redirecționare către ../main.php";
                    header('Location: ../main.php');
                    exit();
                }
                ?>
                <form action="" method="post">
                    <button type="submit" name="buton_apelare" class="btn_apelare">LOGOUT</button>
                </form>
            </body>
            </html>
            