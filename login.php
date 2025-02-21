<?php
session_start();

// Connexion à la base de données
$host = 'localhost';
$dbname = 'nom_de_ta_base';
$username = 'ton_utilisateur';
$password = 'ton_mot_de_passe';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Vérification des informations
  $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['password'])) {
    // Connexion réussie
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    header('Location: dashboard.php'); // Redirection vers le tableau de bord
    exit();
  } else {
    // Erreur de connexion
    echo "Email ou mot de passe incorrect.";
  }
}
?>