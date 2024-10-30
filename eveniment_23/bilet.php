
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Cos de cumparaturi</title>
                <link rel='stylesheet' type='text/css' href='../bilet.css'>
            </head>

            <body>
                <h2>Cos de cumparaturi</h2>
                <?php
                $conn = new mysqli("localhost", "root", "", "evenimente");
                
                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }
                
                $sql ="SELECT eveniment FROM cos WHERE user = 3";
                
                $result = $conn->query($sql);
                $totalEvenimente=0;
                
                if ($result->num_rows > 0) {
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
                $conn->close();
                ?>
            </body>
            </html>
            