
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
                    $conn = new mysqli('localhost', 'root', '', 'evenimente');
                    
                    if ($conn->connect_error) {
                        die('Conexiunea la baza de date a eșuat: ' . $conn->connect_error);
                    }

                    $sql ="SELECT S.poza, S.nume, S.descriere  FROM speakers S JOIN eveniment_speakers E ON S.id=E.id_speaker WHERE 23=E.id_eveniment";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='speaker-box'>";
                            echo "<img src='../" . $row['poza'] . "' class='pozaartist' alt='Poza Speakerului'>";
                            echo "<h3>" . $row['nume'] . "</h3>";
                            echo "<p>" . $row['descriere'] . "</p>";
                            echo "</div>";
                        }
                    } else {
                        echo "Nu există informații despre speakeri.";
                    }
                    $conn->close();
                    ?>
                </body>
            </html>
            