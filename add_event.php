<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="add.css">
    <title>Adăugare Eveniment</title>
</head>
<body>
<div class="container">
    <h2>Adăugare Eveniment</h2>
    <form action="" method="post">
        <label for="titlu">Titlu:</label>
        <input type="text" name="titlu" required><br><br>

        <label for="descriere">Descriere:</label>
        <textarea name="descriere" required></textarea><br><br>

        <label for="data_ora">Data și Ora:</label>
        <input type="datetime-local" name="data_ora" required><br><br>

        <label for="locatie">Locație:</label>
        <input type="text" name="locatie" required><br><br>

        <label for="telefon">Telefon:</label>
        <input type="text" name="telefon" required><br><br>
        

        <label for="speaker">Speaker:</label>
        <select type="text" name="speaker" required>
            <?php
                $conn = new mysqli("localhost", "root", "", "evenimente");

                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }

                $sql = "SELECT nume FROM speakers";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option >" . $row['nume'] . "</option>";
                    }
                }
                $conn->close();
            ?>
        </select><br><br>

        <label for="partener">Partener:</label>
        <select type="text" name="partener" required>
            <?php
                $conn = new mysqli("localhost", "root", "", "evenimente");

                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }

                $sql = "SELECT nume FROM parteneri";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option >" . $row['nume'] . "</option>";
                    }
                }

                $conn->close();
            ?>
        </select><br><br>

        <label for="sponsor">Sponsor:</label>
        <select type="text" name="sponsor" required>
            <?php
                $conn = new mysqli("localhost", "root", "", "evenimente");

                if ($conn->connect_error) {
                    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
                }

                $sql = "SELECT nume FROM sponsori";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option >" . $row['nume'] . "</option>";
                    }
                }

                $conn->close();
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Adaugă Eveniment">
    </form>
            </div>
</body>
</html>


<?php
$conn = new mysqli("localhost", "root", "", "evenimente");

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

if (isset($_POST['submit']))
{
$titlu = $_POST['titlu'];
$descriere = $_POST['descriere'];
$data_ora = $_POST['data_ora'];
$locatie = $_POST['locatie'];
$telefon = $_POST['telefon'];
$speaker = $_POST['speaker'];
$partener = $_POST['partener'];
$sponsor = $_POST['sponsor'];

if ($titlu == '' || $descriere == ''||$data_ora==''||$locatie=='' || $speaker == '' || $partener == '' || $sponsor == '' || $telefon == '')
{
$error = 'ERROR: Completati toate campurile!';
} else {
if ($stmt = $conn->prepare("INSERT into eveniment (titlu, descriere, data_ora, locatie, telefon) VALUES (?, ?, ?, ?,?)"))
{
$stmt->bind_param("sssss", $titlu, $descriere,$data_ora,$locatie,$telefon);
$stmt->execute();
$id_eveniment = $conn->insert_id; 
$stmt->close();
}
else
{
echo "ERROR: Nu se poate adauga evenimentul";
}

//LUAM ID SPEAKER
if ($stmt2 = $conn->prepare("SELECT id FROM speakers WHERE nume = ?")) {
    $stmt2->bind_param("s", $speaker);
    $stmt2->execute();
    $stmt2->store_result(); 
    if ($stmt2->num_rows > 0) {
        $stmt2->bind_result($id_speaker); // salvează id-ul pe care urmează să-l folosiți
        $stmt2->fetch(); // Ia rezultatul din interogare
        $stmt2->close();
    } else {
        echo "Nu s-a găsit niciun rezultat pentru numele de speaker furnizat.";
    }
}
else {
    echo "Eroare: Nu s-a gasit id";
}

if ($stmt3 = $conn->prepare("INSERT INTO eveniment_speakers(id_eveniment, id_speaker) VALUES (?,?)")){
    $stmt3->bind_param("ii", $id_eveniment, $id_speaker);
    $stmt3->execute();
    $stmt3->close();
}
else{
    echo "Eroare: Inserarea nu a functionat";
}


//LUAM ID PARTENERI
if ($stmt4 = $conn->prepare("SELECT id FROM parteneri WHERE nume = ?")) {
    $stmt4->bind_param("s", $partener);
    $stmt4->execute();
    $stmt4->store_result(); 
    if ($stmt4->num_rows > 0) {
        $stmt4->bind_result($id_parteneri); 
        $stmt4->fetch(); 
        $stmt4->close();
    } else {
        echo "Nu s-a găsit niciun rezultat pentru numele de partenerul furnizat.";
    }
}
else {
    echo "Eroare: Nu s-a gasit id";
}
if ($stmt5 = $conn->prepare("INSERT INTO eveniment_parteneri(id_eveniment, id_partener) VALUES (?,?)")){
    $stmt5->bind_param("ii", $id_eveniment, $id_parteneri);
    $stmt5->execute();
    $stmt5->close();
}
else{
    echo "Eroare: Inserarea nu a functionat";
}

//LUAM ID SPONSORI
if ($stmt6 = $conn->prepare("SELECT id FROM sponsori WHERE nume = ?")) {
    $stmt6->bind_param("s", $sponsor);
    $stmt6->execute();
    $stmt6->store_result(); 
    if ($stmt6->num_rows > 0) {
        $stmt6->bind_result($id_sponsori); 
        $stmt6->fetch(); 
        $stmt6->close();
    } else {
        echo "Nu s-a găsit niciun rezultat pentru numele de partenerul furnizat.";
    }
}
else {
    echo "Eroare: Nu s-a gasit id";
}
if ($stmt7 = $conn->prepare("INSERT INTO eveniment_sponsori(id_eveniment, id_sponsor) VALUES (?,?)")){
    $stmt7->bind_param("ii", $id_eveniment, $id_sponsori);
    $stmt7->execute();
    $stmt7->close();
}
else{
    echo "Eroare: Inserarea nu a functionat";
}

}
}

$conn->close();
?>