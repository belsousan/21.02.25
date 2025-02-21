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
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  // Insertion dans la base de données
  $stmt = $pdo->prepare("INSERT INTO utilisateurs (email, password) VALUES (:email, :password)");
  $stmt->execute(['email' => $email, 'password' => $password]);

  echo "Inscription réussie ! <a href='login.html'>Connectez-vous</a>";
}
?>