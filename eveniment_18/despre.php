
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>MasterClass - MakeUp Mirese </title> 
            <style>
            html, body {
                height: 100%;
            }
            body{
                background-image:url('../imgfundal.jpg');
                background-size: 100% 100%;
                /* Ajustați imaginea pentru a acoperi întreaga suprafață */
                background-position: center center; /* Poziționare în centru */
                background-repeat: no-repeat; /* Fără repetare */
                overflow: hidden;
            }
            h1{
                font-family:Cambria;
                font-size: 35px;
                text-shadow: 2px 2px pink;
                text-align: center;
            }
            h2{
                font-family:Cambria;
                font-size: 20px;
                text-decoration: wavy;
                text-align: center;
                margin-top: -20px;
            }
            p{
                text-align: center;
                font-family: Cambria;
                font-size: 17px;
                font-style: italic;
            }
            #loc {
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px; /* Poți ajusta marginea pentru a controla spațiul în jurul textului */
            }
    
            .topnav
            {
            padding-top:15px;
            padding-bottom:15px;
            overflow: hidden;
            text-align:center;
            width:70%;
            background-color:peachpuff;
            margin:auto;
    
            }
            .topnav a
            {
            padding:50px;
            color: #f2f2f2;
            text-align:center;
            text-decoration:none;
            color:black;
            font-size: 18px;
            font-weight: bold;
            }
            
            a:hover{
            transition:0.7s;
            color:darkred}
    
            .artist{
                width: 50%;
                float: left;
                font-family: Cambria;
                font-size: 20px;
                font-weight: bold;
                text-shadow: 5px 5px 5px salmon;
            }
    
            img{
                border-radius: 50%;
                width: 300px; /* Schimbă dimensiunea imaginii după necesitate */
                height: 300px; /* Schimbă dimensiunea imaginii după necesitate */
                
            }
            #poza1{
                width: 42%;
                float: left;
                margin-top: 100px;
                margin-left: 40px;
            }
            #poza2{
                width: 42%;
                float: left;
                margin-top: 10px;
                margin-left: 40px;
            }
            #iconita{
                width: 20px;
                height: 20px;
            }
            #adresa, #data{
                text-align: right;
                font-family: Cambria;
                font-size: 15px;
                font-style: normal;
            }
    
            </style>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>dsss</p>
                    <p id='data'>2023-11-18 01:39:00</p></div>
                <h1>MasterClass - MakeUp Mirese </h1>
                <h2>~Editia 2023~</h2>
                <div class='topnav'>
                    <a href='agenda.php'> Agenda</a>
                    <a href='speakers.php'>Speakers</a>
                    <a href='sponsori_parteneri.php'>Parteneri & Sponsori</a>
                    <a href='contact_locatie.php'>Contact & Locatie</a>
                    <a href='bilet.php'>Bilete</a>
                    <form action=""method="post">
                        <button type="submit" name="buton_apelare">LOGOUT</button>
                    </form>
                </div><br>
                <p>dsz</p>
                <br>
                <br>
                <br>
                <p><img src = '../poza_generala.jpg'></p>

                <?php
                if (isset($_POST['buton_apelare'])) {
                    header("Location: ../main.php");
                }
                ?>
            </body>
            </html>
            