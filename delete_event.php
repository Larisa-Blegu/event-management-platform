<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="delete.css">
    <title>Șterge Eveniment</title>
</head>
<body>
    <h2>Șterge Eveniment</h2>
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

        <input type="submit" name="submit" value="Șterge Eveniment">
    </form>
        </div>
    <?php
    if (isset($_POST['submit'])) {

        if (isset($_POST['eveniment']) && is_numeric($_POST['eveniment'])) {
        $id_eveniment = $_POST['eveniment'];

        $conn = new mysqli("localhost", "root", "", "evenimente");

        if ($conn->connect_error) {
            die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
        }

        //Stergere din eveniment_speakers
        if ($stmt = $conn->prepare("DELETE FROM eveniment_speakers WHERE id_eveniment = ? ")) {
            $stmt->bind_param("i", $id_eveniment);
            $stmt->execute();

          /*  if ($stmt->affected_rows > 0) {
                echo "<div>Ștergere din eveniment_speakers a fost realizată cu succes!</div>";
            } */
            $stmt->close();
        } 

        //Stergere din eveniment_parteneri
        if ($stmt = $conn->prepare("DELETE FROM eveniment_parteneri WHERE id_eveniment = ? ")) {
            $stmt->bind_param("i", $id_eveniment);
            $stmt->execute();

           /* if ($stmt->affected_rows > 0) {
                echo "<div>Ștergere din eveniment_parteneri a fost realizată cu succes!</div>";
            } */

            $stmt->close();
        } 

        // Ștergere din eveniment_sponsori
        if ($stmt = $conn->prepare("DELETE FROM eveniment_sponsori WHERE id_eveniment = ? ")) {
            $stmt->bind_param("i", $id_eveniment);
            $stmt->execute();

          /*  if ($stmt->affected_rows > 0) {
                echo "<div>Ștergere din eveniment_parteneri a fost realizată cu succes!</div>";
            } */
            $stmt->close();
        } 

        //Stergere din eveniment
        if ($stmt = $conn->prepare("DELETE FROM eveniment WHERE id = ? ")) {
            $stmt->bind_param("i", $id_eveniment);  
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "<div>Ștergere din eveniment a fost realizată cu succes!</div>";
            } 
            $stmt->close();
        } 

        $conn->close();
    }
}
?>
</body>
</html>