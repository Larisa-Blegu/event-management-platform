
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>Bridal Bronzy Make-Up </title> 
                <link rel='stylesheet' type='text/css' href='../despre.css'>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>Wonderland, Strada Feleacu 58</p>
                    <p id='data'>2023-12-15 08:00:00</p></div>
                <h1>Bridal Bronzy Make-Up </h1>
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
                <p>Descoperă frumusețea autentică a machiajului pentru mireasă printr-un masterclass captivant de make-up bridal! În cadrul acestei experiențe exclusive, vei fi ghidată de către experți în arta machiajului pentru a învăța tehnicile și secretele care transformă orice mireasă într-o apariție de vis în ziua cea mare. Veți explora tendințele actuale în machiajul bridal, de la paleta de culori perfecte pentru a pune în valoare fiecare trăsătură, până la tehnici avansate de conturare și iluminare care asigură un aspect proaspăt și radiant pe tot parcursul evenimentului. Prin demonstrații practice și sfaturi personalizate, vei dobândi încrederea și priceperea necesare pentru a crea machiajul perfect, adaptat stilului și personalității fiecărei mirese. Fiecare participant va experimenta o călătorie fascinantă în lumea machiajului bridal, descoperind trucuri de durată și produse profesionale pentru un rezultat impecabil în ziua nunții. Îmbrățișează frumusețea și eleganța cu acest masterclass de make-up bridal, unde visul mireselor devine realitate!</p>
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
            