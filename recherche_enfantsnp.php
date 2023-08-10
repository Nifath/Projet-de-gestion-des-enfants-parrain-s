<?php

session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les critères de recherche saisis par l'utilisateur
$age_min = isset($_POST['age_min']) ? intval($_POST['age_min']) : null;
$age_max = isset($_POST['age_max']) ? intval($_POST['age_max']) : null;
$sexe = isset($_POST['sexe']) ? $conn->real_escape_string($_POST['sexe']) : null;
$classe = isset($_POST['classe']) ? $conn->real_escape_string($_POST['classe']) : null;

// Construire la requête SQL en fonction des critères de recherche
$sql = "SELECT * FROM dossier1 WHERE 1=1";

if ($age_min !== null) {
    $sql .= " AND age >= " . $age_min;
}

if ($age_max !== null) {
    $sql .= " AND age <= " . $age_max;
}

if ($sexe !== null) {
    $sql .= " AND sexe = '" . $sexe . "'";
}

if ($classe !== null) {
    $sql .= " AND classe = '" . $classe . "'";
}

// Exécuter la requête
$instruct = $conn->prepare($sql);
$instruct->execute();
$result = $instruct->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <style>
         body {
  background-image: url("image14.jpg");
  background-size: cover;
  background-position: center;
}
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .btn-view {
            background-color: #4CAF50;
            color: white;
            width: fit-content;
            margin-bottom:20px;
            padding: 5px 20px;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0;
        }
    </style>
</head>
<body>
    
    
    <table>
        <thead>
            <tr>
                
                <th>Nom</th>
                <th>Prenom(s)</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
            <tr>
                
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['sexe'] ?></td>
                <td><?= $row['dateNaissance'] ?></td>
                <td><?= $row['classe'] ?></td>

                <td>
                <a   class="btn-view" href="voir1np.php?id=<?=$row['id_dossier1']?>">Voir</a>
                   
                </td>
           
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br> 
    <button onclick="goToAnotherPage()">Retour</button>


<script>
    function goToAnotherPage() {   
        window.location.href = "criteresnp.php"; 
    } 
</script>
</body>
</html>
