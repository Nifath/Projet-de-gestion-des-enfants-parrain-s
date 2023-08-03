<?php
// voir.php
// Récupérer l'ID de l'enfant à afficher depuis l'URL (passé en paramètre)
$id_dossier1 = $_GET['id_dossier1'];

// Vérifier si l'ID de l'enfant est valide
if (!is_numeric($id_dossier1)) {
    die("ID de l'enfant invalide.");
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les informations de l'enfant à partir de la base de données en fonction de l'ID
$instruct = $conn->prepare('SELECT * FROM dossier1 WHERE id_dossier1 = ?');
$instruct->bind_param('i', $id_enfant);
$instruct->execute();
$result = $instruct->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'enfant</title>
</head>
<body>
    <h1>Détails de l'enfant</h1>
    <p><strong>Nom :</strong> <?= $row['nom'] ?></p>
    <p><strong>Prénom(s) :</strong> <?= $row['prenom'] ?></p>
    <p><strong>Sexe :</strong> <?= $row['sexe'] ?></p>
    <p><strong>Date de Naissance :</strong> <?= $row['dateNaissance'] ?></p>
    <p><strong>Classe :</strong> <?= $row['classe'] ?></p>
    <!-- Afficher d'autres informations de l'enfant ici -->
</body>
</html>
