
<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer l'ID du dossier depuis le paramètre d'URL
$id_dossier1 = $_GET['id'];

// Récupérer les informations du dossier depuis la base de données
$instruct = $conn->prepare('SELECT * FROM dossier1 WHERE id_dossier1 = ?');
$instruct->bind_param('i', $id_dossier1);
$instruct->execute();
$result = $instruct->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir le profil</title>

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

       

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .profile-container {
           display: flex;
            align-items: flex-start; 
            margin-bottom: 20px;
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

        .profile-details {
            flex: 1;
            padding-left: 20px; 
            border-left: 1px solid #ccc; 
        }

        .return-link {
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

.profile-details p {
    margin: 20px 0; 
}

    </style>

    <script src="html2pdf.bundle.js"></script>
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
        </div>
        
    </div>
    <center><a class="return-link" onclick="generatePDF()">Télécharger</a></center>
    <script>

function goToAnotherPage() {   
        window.location.href = "listenp.php"; 
    } 
        function generatePDF() {
            var element = document.querySelector(".container");
            var fileName = encodeURIComponent("<?= $result['nom'] ?><?= $result['prenom'] ?>");
    html2pdf().from(element).save(fileName);
        }

        
    </script>
</body>
</html>
