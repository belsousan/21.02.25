<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo_arcadia";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>





<?php
$conn = new mysqli("localhost", "root", "", "zoo_arcadia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, species FROM animals";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nom: " . $row["name"]. " - Espèce: " . $row["species"]. "<br>";
    }
} else {
    echo "0 résultats";
}

$conn->close();
?>

<?php
create <table></table>
?>













<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Zoo Arcadia</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Mon Zoo Arcadia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="background-section">
        <img src="images/serpent.jpg" alt="serpent">
        <h1>Bienvenue au Zoo Arcadia</h1>
        <p>Découvrez notre sanctuaire écologique.</p>
    </section>
    <main>
        <div class="container">
            <p>
                Plongez dans une aventure fascinante à la rencontre de la faune sauvage. Situé en Bretagne, près de la légendaire forêt de Brocéliande, le Zoo Arcadia accueille depuis 1960 des animaux sauvages dans un environnement respectueux de leurs habitudes naturelles.
            </p>
            <p>
                L'engagement écologique est au cœur de notre mission. Notre indépendance énergétique nous permet de préserver notre environnement tout en offrant une expérience inoubliable à nos visiteurs.
            </p>
            <p>
                En outre, nous adhérons à la sobriété numérique avec un site web conçu selon des principes éco-responsables, utilisant des couleurs éco-print. Nous croyons fermement en la réduction de notre empreinte numérique tout en communiquant efficacement avec notre audience.
            </p>
        </div>
    </main>
    <footer>
        <div class="text-center py-3">
            &copy; 2024 Mon Zoo Arcadia
        </div>
    </footer>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>

<?php 
try {
    $pdo = new PDO(dsn:'mysql:host=locallost;dbname=pdo_application', username:'root',password:'');
    $pdo->query(statement:'SELECT name, email FROM users', mode PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'impossible de se connecter à la base de données';
}