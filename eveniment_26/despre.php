
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>test </title> 
                <link rel='stylesheet' type='text/css' href='../despre.css'>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>test</p>
                    <p id='data'>2023-11-25 17:41:00</p></div>
                <h1>test </h1>
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
                <p>test</p>
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
            