<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trimite Invitatii</title>
    <link rel="stylesheet" type="text/css" href="invitatii.css">
</head>

<body>
    <h2>Trimite Invitatii</h2>
    <div class="container">
    <form action="" method="post">
        <label for="eveniment">Eveniment:</label>
        <select name="eveniment" required>
            <?php
            $conn = new mysqli("localhost", "root", "", "evenimente");

            if ($conn->connect_error) {
                die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
            }

            $sql = "SELECT id, titlu FROM eveniment";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['titlu'] . "</option>";
                }
            }

            $conn->close();
            ?>
        </select>

        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <input type="submit" name="submit" value="Trimite invitatie">
    </form>
        </div>

    <?php
    $sendgridApiKey = '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';

    if (isset($_POST['submit'])) {

        if (isset($_POST['eveniment']) && is_numeric($_POST['eveniment'])) {
        $id_eveniment = $_POST['eveniment'];
        $email = $_POST['email'];

        $conn = new mysqli("localhost", "root", "", "evenimente");

        if ($conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
        }

        $sql_eveniment = "SELECT titlu FROM eveniment WHERE id = $id_eveniment";
        $result_eveniment = $conn->query($sql_eveniment);

        if ($result_eveniment->num_rows > 0) {
            $row_eveniment = $result_eveniment->fetch_assoc();
            $titlu_eveniment = $row_eveniment['titlu'];

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("evenimente@gmail.com", "Evenimentul Tau");
            $email->setSubject("Invitație la eveniment");
            $email->addTo($email);
            $email->addContent("text/plain", "Salut,\n\nEști invitat la evenimentul $titlu_eveniment!\n\nEchipa noastră");

            $sendgrid = new \SendGrid($sendgridApiKey);

            try {
                $response = $sendgrid->send($email);
                echo "<div>Email trimis către $email cu succes!</div>";
            } catch (Exception $e) {
                echo "Emailul nu a putut fi trimis. Eroare: {$e->getMessage()}";
            }
        }

        $conn->close();
    }
}
?>
</body>

</html>
