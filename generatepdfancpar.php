<?php
// Assurez-vous d'inclure la bibliothèque FPDF
require('fpdf.php');
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les données depuis la table "dossier1" en utilisant l'ID du dernier enregistrement inséré
$sql = "SELECT * FROM dossier2 WHERE id_dossier2 = (SELECT MAX(id_dossier2) FROM dossier2)";
$result = $conn->query($sql);

// Vérifier si des données ont été trouvées
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Créer un nouveau document PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Styliser le PDF
    $pdf->SetFont('Arial', 'B', 16); // Police Arial en gras de taille 16
    $pdf->SetTextColor(0, 0, 255); // Texte en bleu (couleur RVB)

    function centerCell($pdf, $text, $height) {
        $pdf->Cell(0, $height, $text, 0, 1, );
    }
    // Ajouter les données récupérées au document PDF
    $pdf->Cell(0, 10, 'Dossier', 0, 1, 'C');
    $pdf->Ln(10);

    // Styliser le texte du formulaire
    $pdf->SetFont('Arial', '', 12, ); // Police Arial de taille 12
    $pdf->SetTextColor(0); // Texte en noir (couleur RVB)
    // Ajouter les données du formulaire au PDF
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Nom: ' . $data['nom'], 0, 1);
    $pdf->Cell(40, 10, 'Prenom(s): ' . $data['prenom'], 0, 1);
    $pdf->Cell(40, 10, 'Sexe: ' . $data['sexe'], 0, 1);
    $pdf->Cell(40, 10, 'Date de naissance: ' . $data['dateNaissance'], 0, 1);
    $pdf->Cell(40, 10, 'Age: ' . $data['age'], 0, 1);
    $pdf->Cell(40, 10, 'Lieu de naissance: ' . $data['lieuNaissance'], 0, 1);
    $pdf->Cell(40, 10, 'Nom du pere: ' . $data['nomPere'], 0, 1);
    $pdf->Cell(40, 10, 'Nom de la mere: ' . $data['nomMere'], 0, 1);
    $pdf->Cell(40, 10, 'Nom du tuteur: ' . $data['nomTuteur'], 0, 1);
    $pdf->Cell(40, 10, 'Classe: ' . $data['classe'], 0, 1);
    $pdf->Cell(40, 10, 'Etablissement: ' . $data['etablissement'], 0, 1);
    $pdf->Cell(40, 10, 'Date de parrainage: ' . $data['dateParrainage'], 0, 1);
    
    

// Renseignements justifiant le parrainage
$pdf->SetFont('Arial', 'B', 12);
centerCell($pdf, 'Renseignements justifiant le parrainage:', 10);
$pdf->SetFont('Arial', '', 12);

// Séparer le texte en lignes et centrer chaque ligne
$renseignements = explode("\n", $data['renseignement']);
foreach ($renseignements as $ligne) {
    centerCell($pdf, $ligne, 10);
}

$pdf->Ln(10);

$pdf->Cell(40, 10, 'Nom du parrain: ' . $data['nomParrain'], 0, 1);
$pdf->Cell(40, 10, 'Contact: ' . $data['contact'], 0, 1);
$pdf->Cell(40, 10, 'Adresse: ' . $data['adresse'], 0, 1);
$pdf->Cell(40, 10, 'Profession: ' . $data['profession'], 0, 1);
$pdf->Cell(40, 10, 'Lieu de travail: ' . $data['lieu_de_travail'], 0, 1);


    // Récupérer les images liées au dossier à partir de la table "images"
    $sqlImages = "SELECT * FROM images WHERE id_dossier = " . $data['id_dossier'];
    $resultImages = $conn->query($sqlImages);

    // Vérifier si des images ont été trouvées
    if ($resultImages->num_rows > 0) {
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Images scannées', 0, 1);

        // Ajouter les images au document PDF
        while ($imageData = $resultImages->fetch_assoc()) {
            // Afficher l'image à partir des données binaires
            $pdf->Ln(10);
            $pdf->Cell(0, 10, 'Nom de l\'image: ' . $imageData['nomImage'], 0, 1);
            // ... Ajoutez ici d'autres informations sur l'image si nécessaire
            $image = $imageData['imageData']; // Récupérer les données binaires de l'image
            $pdf->Image('@' . $image, 10, $pdf->GetY(), 0, 40); // Largeur de l'image fixée à 40, ajustez-la selon vos besoins
        }
    }

    // Enregistrez le PDF sur le serveur
    //$pdf->Output('D', 'dossier_informations.pdf');
    // Ou envoyez le PDF directement au navigateur
    $pdf->Output();
    exit; 
} else {
    echo "Une erreur s'est produite lors de l'enregistrement des informations.";
}

?>