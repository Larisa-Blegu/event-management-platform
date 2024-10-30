<?php
$mysqli = new mysqli("localhost", "root", "", "evenimente");

if ($mysqli->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $mysqli->connect_error);
}
$error = ''; 

if (isset($_POST['submit'])) {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id_eveniment = $_POST['id'];

        if (isset($_POST['titlu'], $_POST['descriere'], $_POST['data_ora'], $_POST['locatie'], $_POST['telefon'])) {
            $titlu = htmlentities($_POST['titlu'], ENT_QUOTES);
            $descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
            $data_ora = htmlentities($_POST['data_ora'], ENT_QUOTES);
            $locatie = htmlentities($_POST['locatie'], ENT_QUOTES);
            $telefon = htmlentities($_POST['telefon'], ENT_QUOTES);

            if ($stmt = $mysqli->prepare("UPDATE eveniment SET titlu=?, descriere=?, data_ora=?, locatie=?, telefon=? WHERE id=?")) {
                $stmt->bind_param("sssssi", $titlu, $descriere, $data_ora, $locatie,$telefon, $id_eveniment);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "<div>Inregistrarea a fost actualizată!</div>";
                } else {
                    echo "<div>Nu s-a realizat nicio actualizare. Nu a fost găsit niciun eveniment cu ID-ul specificat.</div>";
                }

                $stmt->close();
            } else {
                echo "ERROR: " . $mysqli->error;
            }
        } else {
            echo "<div>ERROR: Completati toate campurile</div>";
        }
    } else {
        echo "ID incorect!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare eveniment</title>
    <link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>
<div class="container">
    <h1>
        <?php 
        if (isset($_GET['id'])) {
            echo "Editare eveniment";
        } 
        ?>
    </h1>
    
    <form action="" method="post">
        
        <?php
         $conn = new mysqli("localhost", "root", "", "evenimente");

         if ($conn->connect_error) {
             die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
         }

        if (isset($_GET['id'])) {
            $id_eveniment = $_GET['id'];
            echo "<input type='hidden' name='id' value='$id_eveniment' />";
            
            if ($result = $mysqli->query("SELECT * FROM eveniment WHERE id='$id_eveniment'")) {
                if ($result->num_rows > 0) {
                    $row = $result->fetch_object();
                    ?>
                    <label for="id">ID:</label>
                    <input type="text" name="id" value="<?php echo $row->id; ?>" readonly><br/>

                    <label for="titlu">Titlu:</label>
                    <input type="text" name="titlu" value="<?php echo $row->titlu; ?>" required><br/>

                    <label for="descriere">Descriere:</label>
                    <input type="text" name="descriere" value="<?php echo $row->descriere; ?>" required><br/>

                    <label for="data_ora">Data & Ora:</label>
                    <input type="text" name="data_ora" value="<?php echo $row->data_ora; ?>" required><br/>

                    <label for="locatie">Locatie:</label>
                    <input type="text" name="locatie" value="<?php echo $row->locatie; ?>" required><br/>

                    <label for="telefon">Telefon:</label>
                    <input type="text" name="telefo" value="<?php echo $row->telefon; ?>" required><br/>
        <?php
                }
            }
        }
        $conn->close();
        ?>
        
        <br/>
        <input type="submit" name="submit" value="Submit" />
    </form>
    </div>
</body>
</html>