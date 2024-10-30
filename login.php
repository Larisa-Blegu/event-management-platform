<!DOCTYPE html>
<html>

<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="CSSuser.css">
</head>

<body class="loginUser-background">
    <?php
    session_start();
    global $conn;

    if (isset($_POST['login'])) {
        $utilizator = $_POST['utilizator'];
        $parola = $_POST['parola'];

        $conn = new mysqli("localhost", "root", "", "evenimente");
        if ($conn->connect_error) {
            die("Nu se poate conecta la baza de date: " . $conn->connect_error);
        }

        $query = "SELECT id, username, parola, roles FROM admini WHERE username=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $utilizator);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $parola_hash, $roles);
            $stmt->fetch();

            if (password_verify($parola, $parola_hash)) {
                $_SESSION['id_utilizator'] = $id;
                $_SESSION['username'] = $username;
                if($roles == 0)
                     header("Location: lista_evenimente.php?id=$id");
                else
                     header("Location: panou_control.php");
            } else {
                echo '<div class="error-message-container">
                <div class="error-message">Nu s-a putut efectua autentificarea!</div>
            </div>';         
           }
        } else {
            echo '<div class="error-message-container">
            <div class="error-message">Nu s-a putut efectua autentificarea!</div>
             </div>';
         }
        $stmt->close();
    }
    ?>

    <div class="login-container">

        <h2>Autentificare</h2>
        <form method="post" action="">
            <label for="utilizator">Username:</label>
            <input type="text" name="utilizator" required><br><br>

            <label for="parola">Parola:</label>
            <input type="password" name="parola" required><br><br>

            <input type="submit" name="login" value="Login" class="submit-button">
        </form>
    </div>
</body>
</html>