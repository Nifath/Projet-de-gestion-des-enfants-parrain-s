

<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer l'ID de l'ancien parrainé à partir du paramètre d'URL
$id_dossier2 = $_GET['id'];

// Récupérer les informations de l'ancien parrainé à partir de la base de données
$instruct = $conn->prepare('SELECT * FROM dossier2 WHERE id_dossier2 = ?');
$instruct->bind_param('i', $id_dossier2);
$instruct->execute();
$result = $instruct->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("image16.jpg");
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 6px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            padding: 20px;
            background-color: #3498db;
            color: white;
        }

        .profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .profile-details {
            font-size: 14px;
            color: #333;
            margin-top: 20px;
        }

        .profile-details p {
            margin: 5px 0;
        }

        .return-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        button{
    width: fit-content;
    margin-bottom:20px;
    background-color:#3498db;
    padding: 5px 20px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0; 
}
    </style>
</head>
<body>
    <header> <button onclick="goToAnotherPage()">Retour</button></header>
    <div class="container">
        <div class="profile-header">
            <img class="profile-image" src="data:image/jpeg;base64,<?= base64_encode($result['photoProfil']) ?>" alt="Photo de profil">
            <div class="profile-info">
                <h1 class="profile-name"><?= $result['nom'] ?> <?= $result['prenom'] ?></h1>
            </div>
        </div>
        <div class="profile-details">
            <?php if (!empty($result['photoProfil'])): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($result['photoProfil']) ?>" alt="Photo de profil" style="max-width: 100px; border-radius: 6px;">
            <?php else: ?>
                <p>Aucune photo de profil disponible.</p>
            <?php endif; ?>
            <p><strong>Nom:</strong> <?= $result['nom'] ?></p>
                    <p><strong>Prénom(s):</strong> <?= $result['prenom'] ?></p>
                    <p><strong>Date de Naissance:</strong> <?= $result['dateNaissance'] ?></p>
                    <p><strong>Sexe:</strong> <?= $result['sexe'] ?></p>
                    <p><strong>Lieu de Naissance:</strong> <?= $result['lieuNaissance'] ?></p>
                    <p><strong>Nom du père:</strong> <?= $result['nomPere'] ?></p>
                    <p><strong>Nom de la mère:</strong> <?= $result['nomMere'] ?></p>
                    <p><strong>Nom du tuteur:</strong> <?= $result['nomTuteur'] ?></p>
                    <p><strong>Classe:</strong> <?= $result['classe'] ?></p>
                    <p><strong>Établissement:</strong> <?= $result['etablissement'] ?></p>
                    <p><strong>Renseignement justifiant le parrainage:</strong> <?= $result['renseignement'] ?></p>
                     
                    <p><strong>Nom du parrain:</strong> <?= $result['nomParrain'] ?></p>
                    <p><strong>Contact:</strong> <?= $result['contact'] ?></p>
                    <p><strong>Adresse:</strong> <?= $result['adresse'] ?></p>
                    <p><strong>Profession:</strong> <?= $result['profession'] ?></p>
                    <p><strong>Lieu de travail:</strong> <?= $result['lieu_de_travail'] ?></p>
       
                </div>
        <a class="return-link" href="profil.php">Télécharger</a>
    </div>
   
    <script>
    function goToAnotherPage() {   
        window.location.href = "listenp.php"; 
    } 
</script>   
</body>
</html>

