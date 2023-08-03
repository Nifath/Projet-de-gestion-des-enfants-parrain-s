<?php

session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les critères de recherche saisis par l'utilisateur
$nom = isset($_POST['nom']) ? $conn->real_escape_string($_POST['nom']) : null;
$prenom = isset($_POST['prenom']) ? $conn->real_escape_string($_POST['prenom']) : null;
$adresse = isset($_POST['adresse']) ? $conn->real_escape_string($_POST['adresse']) : null;

// Construire la requête SQL en fonction des critères de recherche
$sql = "SELECT * FROM dossier WHERE 1=1";

if ($nom !== null) {
    $sql .= " AND nom = '" . $nom . "'";
}

if ($prenom !== null) {
    $sql .= " AND prenom = '" . $prenom . "'";
}



if ($adresse !== null) {
    $sql .= " AND adresse = '" . $adresse . "'";
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
        
        .btn {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            
        }
        
        .btn-view {
            background-color: #4CAF50;
            color: white;
        }
        
       
        .section {
            display: none;
        }
        
        .section.open {
            display: block;
        }
    </style>
</head>
<body>
    
<table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom(s)</th>
                <th>Nom parrain</th>
                <th>Adresse</th>
                <th>Contact</th>
                <th>Profession</th>
                <th>Actions</th>

              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['nomParrain'] ?></td>
                <td><?= $row['adresse'] ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['profession'] ?></td>

                <td>
                    <button class="btn btn-view" onclick="toggleSection('section1')">Voir</button>
                    
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br> 
    <button onclick="goBack()">Retour</button>


<script>
    function goBack() {
        window.history.back(); 
    }  
</script>    
</body>
</html>
