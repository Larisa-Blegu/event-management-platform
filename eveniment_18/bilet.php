
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cos de cumparaturi</title>
                <style>
                    /* Stilizare pentru a afișa boxele cu bilete sub formă de listă */
                    .bilet-box {
                        border: 1px solid #ccc;
                        margin: 10px;
                        padding: 10px;
                        text-align: center;
                        
                    }
                    body{
                        background-image:url('imgfundal.jpg');
                        background-size: 100% 130%;
                        /* Ajustați imaginea pentru a acoperi întreaga suprafață */
                        background-position: center center; /* Poziționare în centru */
                        background-repeat: no-repeat; /* Fără repetare */
                        justify-content: center;
                        align-items: center;
                    }
                </style>
            </head>

            <body>

                <h2>Cos de cumparaturi</h2>

                <?php
                // Conectarea la baza de date
                $conn = new mysqli("localhost", "root", "", "evenimente");
                

                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }

                // Obținerea datelor despre speakeri din baza de date
                
                $sql ="SELECT eveniment FROM cos WHERE user = 2";
                
                
                $result = $conn->query($sql);
                $totalEvenimente=0;
                

                if ($result->num_rows > 0) {
                    // Afisarea datelor pentru fiecare speaker
                    while ($row = $result->fetch_assoc()) {
                        $totalEvenimente = $totalEvenimente+80;
                        echo "<div class='speaker-box'>";
                        echo "<h3>" . $row['eveniment'] . "</h3>";
                        echo "<p>" ."pret: 80 lei". "</p>";
                        echo "</div>";
                    }

                    echo "<p>" ."Total: $totalEvenimente". "</p>";

                } else {
                    echo "Cosul de cumparaturi este gol.";
                }

                // Închiderea conexiunii la baza de date
                $conn->close();
                ?>

            </body>

            </html>
            