<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "username", "password", "database");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insertion des données dans la base de données
    $stmt = $mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>

<form method="post" action="">
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <input type="submit" value="S'inscrire">
</form>