<?php
// Vérifier si le formulaire a été soumis
if(isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['lastname'];
    $prenom = $_POST['firstname'];
    $sexe = $_POST['sexe'];
    $dateNaissance = $_POST['dateNaissance'];
    $age= $_POST['age'];
    $lieuNaissance = $_POST['lieuNaissance'];
    $nomPere = $_POST['nomPere'];
    $nomMere = $_POST['nomMere'];
    $nomTuteur = $_POST['nomTuteur'];
    $classe = $_POST['classe'];
    $etablissement = $_POST['etablissement'];
    $dateParrainage = $_POST['dateParrainage'];
    $renseignement = $_POST['renseignements'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'caeb');

    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer les données dans la table "dossier"
    $sql = "INSERT INTO dossier (nom, prenom, sexe, dateNaissance, age, lieuNaissance, nomPere, nomMere, nomTuteur, classe, etablissement, renseignement, photoProfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vérifier si une photo de profil a été téléchargée
    if (isset($_FILES["photoProfil"]) && $_FILES["photoProfil"]["error"] == UPLOAD_ERR_OK) {
        $photoProfil = $_FILES["photoProfil"]["tmp_name"];
        $photoProfilData = file_get_contents($photoProfil);

        // Ajouter la photo de profil au tableau des données à insérer
        $stmt->bind_param('sssssssssssss', $nom, $prenom, $sexe, $dateNaissance, $age, $lieuNaissance, $nomPere, $nomMere, $nomTuteur, $classe, $etablissement, $renseignement, $photoProfilData);
    } else {
        // Si aucune photo de profil n'a été téléchargée, ajouter NULL au champ de la base de données
        $stmt->bind_param('ssssssssssss', $nom, $prenom, $sexe, $dateNaissance, $age, $lieuNaissance, $nomPere, $nomMere, $nomTuteur, $classe, $etablissement, $renseignement);
    }

    // Exécuter la requête pour enregistrer les informations du dossier
    if ($stmt->execute()) {
        $newID = $conn->insert_id;  // Récupérer l'ID du dossier inséré

        // Enregistrer les fichiers scannés dans la table "images"
        if (isset($_FILES["scannedDocuments"]) && is_array($_FILES["scannedDocuments"]["name"])) {
            for ($i = 0; $i < count($_FILES["scannedDocuments"]["name"]); $i++) {
                $nomImage = $_FILES["scannedDocuments"]["name"][$i];
                $tailleImage = $_FILES["scannedDocuments"]["size"][$i];
                $typeImage = $_FILES["scannedDocuments"]["type"][$i];
                $tmpName = $_FILES["scannedDocuments"]["tmp_name"][$i];
                $imageData = file_get_contents($tmpName);

                // Préparer la requête SQL pour insérer les données de l'image dans la table "images"
                $sqlImages = "INSERT INTO images (id_dossier, nomImage, tailleImage, typeImage, imageData) VALUES (?, ?, ?, ?, ?)";
                $stmtImages = $conn->prepare($sqlImages);
                $stmtImages->bind_param('isbbs', $newID, $nomImage, $tailleImage, $typeImage, $imageData);
                $stmtImages->execute();
            }
        }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();


  header("Location: generatepdfpar .php");
    exit;
    echo "Une erreur s'est produite lors de l'enregistrement des informations.";
}
}
?>
