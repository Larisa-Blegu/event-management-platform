<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = "";
$DATABASE_NAME = 'evenimente';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Nu se poate conecta la baza de date: ' . mysqli_connect_error()); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['nume'], $_POST['prenume'])) {
        exit('Completati formularul');
    }

    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['nume']) || empty($_POST['prenume'])) {
        exit('Completati toate campurile.');
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('Email invalid!');
    }

    if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
        exit('Username invalid!');
    }

    if (strlen($_POST['password']) < 6) {
        exit('Parola trebuie sa contină minim 6 caractere!');
    }

    $stmt = $con->prepare('SELECT id, parola FROM admini WHERE username = ?');
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<p>Alegeti alt username deoarece acesta a fost deja folosit!</p>';
    } else {
        $stmt = $con->prepare('INSERT INTO admini (username, parola, email, nume, prenume) VALUES (?, ?, ?, ?, ?)');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->bind_param('sssss', $_POST['username'], $password, $_POST['email'], $_POST['nume'], $_POST['prenume']);
        $stmt->execute();
        echo '<p>Inregistrare reusita!</p>';
    }
    $stmt->close();
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="reg.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular de SignUp</title>
</head>

<body class="single-background">
    <div class="register-container">
        <h1>SignUp</h1>
        <form action="register.php" method="post" autocomplete="off" class="register-form">
            <label for="username" class="icon-label">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password" class="icon-label">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Parola" id="password" required>
            <label for="email" class="icon-label">
                <i class="fas fa-envelope"></i>
            </label>
            <input type="email" name="email" placeholder="Email" id="email" required>
            <label for="nume" class="icon-label">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="nume" placeholder="Nume" id="nume" required>
            <label for="prenume" class="icon-label">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="prenume" placeholder="Prenume" id="prenume" required>
            <input type="submit" value="SignUp" class="submit-button">
        </form>
    </div>
</body>

</html>