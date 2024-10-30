
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sponsori</title>
                <link rel='stylesheet' type='text/css' href='../sponsori.css'>
            </head>

            <body>
                <h2>Sponsori & Parteneri</h2>
                <br>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'evenimente');
            
                    if ($conn->connect_error) {
                        die('Conexiunea la baza de date a eșuat: ' . $conn->connect_error);
                    }

                    $sql ="SELECT S.poza, S.nume, S.descriere  FROM sponsori S JOIN eveniment_sponsori E ON S.id=E.id_sponsor WHERE 23=E.id_eveniment";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='speaker-box'>";
                            echo "<img src='../" . $row['poza'] . "' class='poza' alt='Poza Sponsorului'>";
                            echo "<h3>" . $row['nume'] . "</h3>";
                            echo "<p>" . $row['descriere'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nu există informații despre sponosori.";
                    }

                
                $sql ="SELECT S.poza, S.nume, S.descriere  FROM parteneri S JOIN eveniment_parteneri E ON S.id=E.id_partener WHERE 23=E.id_eveniment";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='speaker-box'>";
                            echo "<img src='../" . $row['poza'] . "' class='poza' alt='Poza Partenerului'>";
                            echo "<h3>" . $row['nume'] . "</h3>";
                            echo "<p>" . $row['descriere'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nu există informații despre parteneri.";
                    }
                $conn->close();
                ?>
            </body>
            </html>
            