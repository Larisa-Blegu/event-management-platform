
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>Comercial Make-Up </title> 
                <link rel='stylesheet' type='text/css' href='../despre.css'>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>Marion, Strada Avram Iancu 336, Florești 407280</p>
                    <p id='data'>2024-01-10 08:00:00</p></div>
                <h1>Comercial Make-Up </h1>
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
                <p>Bun venit la cursul nostru avansat de machiaj, "Masterclass - Comercial Make-Up", o experiență captivantă care vă va ghida prin universul expresiv al machiajului artistic. În cadrul acestui curs, veți avea oportunitatea de a explora tehnici avansate de machiaj axate pe utilizarea culorilor intense și a conturării accentuate pentru a crea machiaje pline de impact vizual. Vom dedica timp înțelegerii subtilităților psihologiei culorilor și modului în care acestea pot influența percepția machiajului, precum și învățarea tehnicii conturării și iluminării pentru a evidenția și defini trăsăturile feței. Veți explora machiajul ochilor într-un mod dramatic, aducând în prim-plan tehnici precum machiajul cat-eye și smokey eyes, folosind culori și pigmenti strălucitori. În plus, veți învăța cum să aplicați buzelor nuanțe îndrăznețe și rujuri intense pentru a completa un look expresiv. Acest curs își propune să vă ofere abilități avansate în arta machiajului, îmbogățindu-vă cunoștințele și oferindu-vă instrumentele necesare pentru a vă exprima creativitatea într-un mod inovator și original. La finalul acestuia, veți primi un certificat de absolvire, confirmând competențele dobândite în timpul acestui periplu artistic. Înscrieți-vă acum și descoperiți lumea fascinantă și provocatoare a machiajului strident!</p>
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
            