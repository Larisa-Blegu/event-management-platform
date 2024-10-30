<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="panou_control.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <div id="admin-panel">
        <h1>Admin Panel</h1>

        <a href="add_event.php" class="admin-button">
            Adaugare Eveniment
        </a>

        <a href="delete_event.php" class="admin-button">
            Stergere Eveniment
        </a>

         <a href="invitatii_event.php" class="admin-button">
            Trimite Invitatie
        </a>

        <h2>Evenimente Existent</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Titlu</th>
                <th>Descriere</th>
                <th>Data & Ora</th>
                <th>Locatie</th>
                <th>Actiuni</th>
            </tr>

            <?php
            $mysqli = new mysqli("localhost", "root", "", "evenimente");

            if ($mysqli->connect_error) {
                die("Conexiunea la baza de date a eșuat: " . $mysqli->connect_error);
            }

            $result = $mysqli->query("SELECT * FROM eveniment");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['titlu']}</td>
                            <td>{$row['descriere']}</td>
                            <td>{$row['data_ora']}</td>
                            <td>{$row['locatie']}</td>
                            <td>
                                <a href='edit_event.php?id={$row['id']}'>Editare</a> 
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nu exista evenimente.</td></tr>";
            }

            
            
            $mysqli->close();
            ?>
        </table>
    </div>
</body>

</html>
