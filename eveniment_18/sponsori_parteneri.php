
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sponsori</title>
                <style>
                    /* Stilizare pentru a afișa boxele cu sponsori sub formă de listă */
                    .sponsori-box {
                        border: 1px solid #ccc;
                        margin: 10px;
                        padding: 10px;
                        text-align: center;
                    }
                    /* Stilizare pentru a afișa boxele cu parteneri sub formă de listă */
                    .parteneri-box {
                        border: 1px solid #ccc;
                        margin: 10px;
                        padding: 10px;
                        text-align: center;
                    }
                    body{
                        background-image:url('../imgfundal.jpg');
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

                <h2>Sponsori & Parteneri</h2>

                <?php
                    // Conectarea la baza de date
                    $conn = new mysqli('localhost', 'root', '', 'evenimente');
                    

                    if ($conn->connect_error) {
                        die('Conexiunea la baza de date a eșuat: ' . $conn->connect_error);
                    }

                    // Obținerea datelor despre speakeri din baza de date
                    $sql ="SELECT S.poza, S.nume, S.descriere  FROM sponsori S JOIN eveniment_sponsori E ON S.id=E.id_sponsor WHERE 18=E.id_eveniment";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Afisarea datelor pentru fiecare speaker
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='speaker-box'>";
                            echo "<img src='../" . $row['poza'] . "' alt='Poza Speakerului'>";
                            echo "<p>" . $row['poza'] . "</p>";
                            echo "<h3>" . $row['nume'] . "</h3>";
                            echo "<p>" . $row['descriere'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nu există informații despre speakeri.";
                    }


                // Obținerea datelor despre parteneri din baza de date
                $sql ="SELECT S.poza, S.nume, S.descriere  FROM parteneri S JOIN eveniment_parteneri E ON S.id=E.id_partener WHERE 18=E.id_eveniment";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Afisarea datelor pentru fiecare speaker
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='speaker-box'>";
                            echo "<img src='../" . $row['poza'] . "' alt='Poza Speakerului'>";
                            echo "<p>" . $row['poza'] . "</p>";
                            echo "<h3>" . $row['nume'] . "</h3>";
                            echo "<p>" . $row['descriere'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nu există informații despre speakeri.";
                    }

                // Închiderea conexiunii la baza de date
                $conn->close();
                ?>

            </body>

            </html>

            