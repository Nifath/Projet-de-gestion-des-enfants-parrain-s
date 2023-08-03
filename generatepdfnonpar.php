<?php
// Assurez-vous d'inclure la bibliothèque FPDF
require('fpdf.php');

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les données depuis la table "dossier1" en utilisant l'ID du dernier enregistrement inséré
$sql = "SELECT * FROM dossier1 WHERE id_dossier1 = (SELECT MAX(id_dossier1) FROM dossier1)";
$result = $conn->query($sql);

// Vérifier si des données ont été trouvées
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
// Créer un nouveau document PDF
$pdf = new FPDF();
$pdf->AddPage();

// Charger la police et définir la taille du texte
$pdf->SetFont('Arial', '', 12);

// Ajouter les données récupérées au document PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Dossier Informations', 0, 1, 'C');
$pdf->Ln(10);

// Insérer la photo de profil dans le PDF
if (!empty($data['photoProfil'])) {
    $photoProfilData = $data['photoProfil'];
    $image = imagecreatefromstring(base64_decode($imageData['imageData']));

    if ($photoProfil !== false) {
        $pdf->Cell(0, 40, '', 0, 1, 'C'); // Espace pour la photo
        $pdf->Image('@' . $photoProfilData, 80, $pdf->GetY(), 50, 50); // Insérer l'image avec une taille de 50x50
        $pdf->Cell(0, 10, '', 0, 1, 'C'); // Espacement après la photo
    }
}

// Ajouter les données du formulaire au PDF
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Nom: ' . $data['nom'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Prénom(s): ' . $data['prenom'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Sexe: ' . $data['sexe'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Date de naissance: ' . $data['dateNaissance'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Âge: ' . $data['age'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Lieu de naissance: ' . $data['lieuNaissance'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Nom du père: ' . $data['nomPere'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Nom de la mère: ' . $data['nomMere'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Nom du tuteur: ' . $data['nomTuteur'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Classe: ' . $data['classe'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Établissement: ' . $data['etablissement'], 0, 1, 'C');
$pdf->Cell(0, 10, 'Date de parrainage: ' . $data['dateParrainage'], 0, 1, 'C');
$pdf->Ln(10);

// Renseignements justifiant le parrainage
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Renseignements justifiant le parrainage:', 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

// Séparer le texte en lignes et centrer chaque ligne
$renseignements = explode("\n", $data['renseignement']);
foreach ($renseignements as $ligne) {
    $pdf->Cell(0, 10, $ligne, 0, 1, 'C');
}




$id_image1 = 1;

// Récupérer les données de l'image depuis la base de données (assurez-vous d'avoir une colonne BLOB pour stocker les images)
$sql = "SELECT imageData FROM images1 WHERE id = $id_image1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer les données binaires de l'image
    $row = $result->fetch_assoc();
    $imageData = $row["imageData"];

    // Créer une ressource d'image à partir des données binaires
    $sourceImage = imagecreatefromstring($imageData);

    if ($sourceImage !== false) {
        // Obtenez les dimensions de l'image source
        $sourceWidth = imagesx($sourceImage);
        $sourceHeight = imagesy($sourceImage);

        // Par exemple, redimensionnez l'image source à 200x200 pixels
        $destinationWidth = 200;
        $destinationHeight = 200;

        // Crée une nouvelle image de destination avec les dimensions souhaitées
        $destinationImage = imagecreatetruecolor($destinationWidth, $destinationHeight);

        // Effectuez le redimensionnement de l'image source vers l'image de destination
        imagecopyresampled(
            $destinationImage, // Image de destination
            $sourceImage,      // Image source
            0, 0,              // Coordonnées de destination x et y (commencent tous deux à 0 pour l'image de destination)
            0, 0,              // Coordonnées source x et y (commencent tous deux à 0 pour l'image source)
            $destinationWidth, // Largeur de destination
            $destinationHeight,// Hauteur de destination
            $sourceWidth,      // Largeur source
            $sourceHeight      // Hauteur source
        );

       
        // Libérez la mémoire en détruisant les images
        imagedestroy($sourceImage);
        imagedestroy($destinationImage);
    } else {
        die('Impossible de créer l\'image à partir des données binaires.');
    }
} else {
    die('Aucune image trouvée dans la base de données avec cet ID.');
}
    

    // Enregistrez le PDF sur le serveur
    //$pdf->Output('D', 'dossier_informations.pdf');
    // Ou envoyez le PDF directement au navigateur
     $pdf->Output();
      exit; // Arrêtez l'exécution du script ici, afin d'éviter d'afficher le reste du code HTML.
    } else {
        echo "Une erreur s'est produite lors de l'enregistrement des informations.";
    }
?>