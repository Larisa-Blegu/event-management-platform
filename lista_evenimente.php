<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evenimente</title>
    <style>
        .event-box {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
            text-align: center;
        }
        .buy-ticket-btn {
            background-color: #c780c7;
            color: pink;
            padding: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .btn2_cos{
            background-color: #c780c7;
            color: pink;
            padding: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        body{
            background-image:url('imgfundal.jpg');
            background-size: 100% 130%;
            background-position: center center; 
            background-repeat: no-repeat; 
            justify-content: center;
            align-items: center;
        }
        h2{
            font-family:Cambria;
            font-size: 35px;
            text-shadow: 2px 2px pink;
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Evenimente</h2>
    <?php
    session_start();
    if (isset($_SESSION['id_utilizator'])) {
        $id_utilizator = $_SESSION['id_utilizator'];
    }

    $conn = new mysqli("localhost", "root", "", "evenimente");
    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM eveniment";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $event_id = $row['id'];
            $event_title = $row['titlu'];
            $event_description = $row['descriere'];
            $event_data=$row['data_ora'];
            $event_locatie=$row['locatie'];
            $event_telefon=$row['telefon'];

            $event_directory = "eveniment_$event_id";
            if (!is_dir($event_directory)) {
                mkdir($event_directory); 
            }
    
            $about_page = "$event_directory/despre.php";
            $about_content = "
            
            <!DOCTYPE html>
            <html>
            <head>
                <title>$event_title </title> 
                <link rel='stylesheet' type='text/css' href='../despre.css'>
            </head>
    
            <body>
            <div id='loc'>
                    <p id='adresa'>$event_locatie</p>
                    <p id='data'>$event_data</p></div>
                <h1>$event_title </h1>
                <h2>~Editia 2023-2024~</h2>
                <div class='topnav'>
                    <a href='agenda.php'> Agenda</a>
                    <a href='speakers.php'>Speakers</a>
                    <a href='sponsori_parteneri.php'>Parteneri & Sponsori</a>
                    <a href='contact_locatie.php'>Contact & Locatie</a>
                    <a href='bilet.php'>Bilete</a>
                    <form action=\"\"method=\"post\">
                    <br>
                    </form>
                </div><br>
                <p>$event_description</p>
                <br> <br> <br>
                <p><img src = '../poza_generala4.jpg'></p>
                <?php
                
                if (isset("."$"."_POST['buton_apelare'])) {
                    session_destroy();
                    echo \"Redirecționare către ../main.php\";
                    header('Location: ../main.php');
                    exit();
                }
                ?>
                <form action=\"\" method=\"post\">
                    <button type=\"submit\" name=\"buton_apelare\" class=\"btn_apelare\">LOGOUT</button>
                </form>
            </body>
            </html>
            ";
            file_put_contents($about_page, $about_content);


           

            $sql_speakers= "SELECT S.poza, S.nume, S.descriere  FROM speakers S JOIN eveniment_speakers E ON S.id=E.id_speaker WHERE $event_id=E.id_eveniment";
            $about_speakers = "$event_directory/speakers.php";
            $about_content_speakers="
                <!DOCTYPE html>
                <html lang='en'>

                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Speakers</title>
                    <link rel='stylesheet' type='text/css' href='../sponsori.css'>
                </head>

                <body>
                    <h2>Speakeri</h2><br>
                    <?php
                    "."$"."conn = new mysqli('localhost', 'root', '', 'evenimente');
                    
                    if ("."$"."conn->connect_error) {
                        die('Conexiunea la baza de date a eșuat: ' . "."$"."conn->connect_error);
                    }

                    "."$"."sql =\"$sql_speakers\";
                    "."$"."result = "."$"."conn->query("."$"."sql);

                    if ("."$"."result->num_rows > 0) {
                        while ("."$"."row = "."$"."result->fetch_assoc()) {
                            echo \"<div class='speaker-box'>\";
                            echo \"<img src='../\" . "."$"."row['poza'] . \"' class='pozaartist' alt='Poza Speakerului'>\";
                            echo \"<h3>\" . "."$"."row['nume'] . \"</h3>\";
                            echo \"<p>\" . "."$"."row['descriere'] . \"</p>\";
                            echo \"</div>\";
                        }
                    } else {
                        echo \"Nu există informații despre speakeri.\";
                    }
                    "."$"."conn->close();
                    ?>
                </body>
            </html>
            ";
            file_put_contents($about_speakers, $about_content_speakers);


            $sql_parteneri= "SELECT S.poza, S.nume, S.descriere  FROM parteneri S JOIN eveniment_parteneri E ON S.id=E.id_partener WHERE $event_id=E.id_eveniment";
            $sql_sponsori= "SELECT S.poza, S.nume, S.descriere  FROM sponsori S JOIN eveniment_sponsori E ON S.id=E.id_sponsor WHERE $event_id=E.id_eveniment";

            $about_sponsori_parteneri = "$event_directory/sponsori_parteneri.php";
            $about_content_sp="
            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Sponsori</title>
                <link rel='stylesheet' type='text/css' href='../sponsori.css'>
            </head>

            <body>
                <h2>Sponsori & Parteneri</h2>
                <br>
                <?php
                    "."$"."conn = new mysqli('localhost', 'root', '', 'evenimente');
            
                    if ("."$"."conn->connect_error) {
                        die('Conexiunea la baza de date a eșuat: ' . "."$"."conn->connect_error);
                    }

                    "."$"."sql =\"$sql_sponsori\";
                    "."$"."result = "."$"."conn->query("."$"."sql);

                    if ("."$"."result->num_rows > 0) {
                        while ("."$"."row = "."$"."result->fetch_assoc()) {
                            echo \"<div class='speaker-box'>\";
                            echo \"<img src='../\" . "."$"."row['poza'] . \"' class='poza' alt='Poza Sponsorului'>\";
                            echo \"<h3>\" . "."$"."row['nume'] . \"</h3>\";
                            echo \"<p>\" . "."$"."row['descriere'] . \"</p>\";
                            echo \"</div>\";
                        }
                    } else {
                        echo \"Nu există informații despre sponosori.\";
                    }

                
                "."$"."sql =\"$sql_parteneri\";
                    "."$"."result = "."$"."conn->query("."$"."sql);

                    if ("."$"."result->num_rows > 0) {
                        while ("."$"."row = "."$"."result->fetch_assoc()) {
                            echo \"<div class='speaker-box'>\";
                            echo \"<img src='../\" . "."$"."row['poza'] . \"' class='poza' alt='Poza Partenerului'>\";
                            echo \"<h3>\" . "."$"."row['nume'] . \"</h3>\";
                            echo \"<p>\" . "."$"."row['descriere'] . \"</p>\";
                            echo \"</div>\";
                        }
                    } else {
                        echo \"Nu există informații despre parteneri.\";
                    }
                "."$"."conn->close();
                ?>
            </body>
            </html>
            ";
            file_put_contents($about_sponsori_parteneri, $about_content_sp);


            $about_contact_locatie = "$event_directory/contact_locatie.php";
            $about_content_contact="

            <!DOCTYPE html>
            <html lang=\"en\">
            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Locatie si Contact</title>
                <link rel='stylesheet' type='text/css' href='../locatie.css'>
            </head>

            <body>
                <h1>Contact & Locatie</h1><br>
                
                <h2>Evenimentul va avea loc la : <b>$event_locatie</b></h2>
                <h2>Pentru mai multe detalii ne puteti contacta la numarul de telefon: <b>$event_telefon</b></h2>
            </body>
            </html>   
            ";
            file_put_contents($about_contact_locatie, $about_content_contact);


            $about_agenda = "$event_directory/agenda.php";
            $about_content_agenda="
            <!DOCTYPE html>
            <html lang=\"en\">

            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Agenda Eveniment</title>
                <link rel='stylesheet' type='text/css' href='../agenda.css'>
            </head>
            <body>
            <div class=\"agenda\">
                <div class=\"event\">
                    <div class=\"time\">8:00 - 9:30</div>
                    <div class=\"description\">Prezentare speakers</div>
                </div>
                <div class=\"event\">
                    <div class=\"time\">9:30 - 10:00</div>
                    <div class=\"description\">Coffee Break</div>
                </div>
                <div class=\"event\">
                    <div class=\"time\">10:00 - 13:00</div>
                    <div class=\"description\">Demonstratie MakeUp</div>
                </div>
                <div class=\"event\">
                    <div class=\"time\">13:00 - 14:00</div>
                    <div class=\"description\">Lunch Break</div>
                </div>
                <div class=\"event\">
                    <div class=\"time\">14:00 - 17:00</div>
                    <div class=\"description\">Demonstratie MakeUp Partea a doua</div>
                </div>
                <div class=\"event\">
                    <div class=\"time\">17:00 - 18:00</div>
                    <div class=\"description\">Prezentare branduri MakeUp & Shopping</div>
                </div>
            </div>
            </body>
            </html>
            ";

            file_put_contents($about_agenda, $about_content_agenda);


            $sql_bilete = "SELECT eveniment FROM cos WHERE user = $id_utilizator";

            $about_bilet = "$event_directory/bilet.php";
            $about_content_bilet="
            <!DOCTYPE html>
            <html lang=\"en\">

            <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>Cos de cumparaturi</title>
                <link rel='stylesheet' type='text/css' href='../bilet.css'>
            </head>

            <body>
                <h2>Cos de cumparaturi</h2>
                <?php
                "."$"."conn = new mysqli(\"localhost\", \"root\", \"\", \"evenimente\");
                
                if ("."$"."conn->connect_error) {
                    die(\"Conexiunea la baza de date a eșuat: \" . "."$"."conn->connect_error);
                }
                
                "."$"."sql =\"$sql_bilete\";
                
                "."$"."result = "."$"."conn->query("."$"."sql);
                "."$"."totalEvenimente=0;
                
                if ("."$"."result->num_rows > 0) {
                    while ("."$"."row = "."$"."result->fetch_assoc()) {
                        "."$"."totalEvenimente = "."$"."totalEvenimente+80;
                        echo \"<div class='speaker-box'>\";
                        echo \"<h3>\" . "."$"."row['eveniment'] . \"</h3>\";
                        echo \"<p>\" .\"pret: 80 lei\". \"</p>\";
                        echo \"</div>\";
                    }
                    echo \"<p>\" .\"Total: "."$"."totalEvenimente\". \"</p>\";
                } else {
                    echo \"Cosul de cumparaturi este gol.\";
                }
                "."$"."conn->close();
                ?>
            </body>
            </html>
            ";
            file_put_contents($about_bilet, $about_content_bilet);

            echo "<div class='event-box'>";
            echo "<h2>" . $event_title . "</h2>";
            //echo "<p>" . $event_description . "</p>";
            echo "<p>Data: " . $event_data . "</p>";
            echo "<p>Locație: " . $event_locatie . "</p>";
            echo "<a class='buy-ticket-btn' href='eveniment_$event_id/despre.php'>Selecteaza evenimentul</a><br>";
            echo "<form action=\"\" method=\"post\">

            <input type=\"submit\" class='buy-ticket-btn' name=\"submit_$event_id\" value=\"Adauga in cos\">
            </form>";
            echo "</div>";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit_$event_id"])) {
                    if (!empty($id_utilizator) && !empty($event_title)) {
                        if ($stmt2 = $conn->prepare("INSERT INTO cos (user, eveniment) VALUES (?, ?)")) {
                            $stmt2->bind_param('ss', $id_utilizator, $event_title);
                            $stmt2->execute();
                            echo '<div style="text-align: center; font-size: 24px; margin-top: 50px; color: green;">Bilet adaugat cu succes!</div>';
                            $stmt2->close();
                        } else {
                            echo "ERROR: Nu se poate adauga in cos";
                        }
                    } else {
                        echo "ERROR: Lipsesc datele necesare pentru adaugare in cos";
                    }
                }else {
                }
            }


              }
            } else {
                echo "Nu există informații despre evenimente.";
            }
    $conn->close();
    ?>
</body>
</html>