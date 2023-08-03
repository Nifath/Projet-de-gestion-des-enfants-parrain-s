<?php

session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupération de la liste des étudiants
$instruct = $conn->prepare('SELECT * FROM dossier');
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
        
        .btn-edit {
            background-color: #2196F3;
            color: white;
        }
        
        .btn-delete {
            background-color: #f44336;
            color: white;
        }
        
        .section {
            display: none;
        }
        
        .section.open {
            display: block;
        }
        .topbar .logo{
            padding:-5px;
        }
    </style>
</head>
<body>

    <center>
        <h1>Enfants non parrainés</h1>
    </center>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom(s)</th>
                <th>Sexe</th>
                <th>Date de Naissance</th>
                <th>Classe</th>
                <th>Actions</th>
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
                    <button class="btn btn-view" onclick="toggleSection('section1')">Voir</button>
                    <button class="btn btn-edit" onclick="toggleSection('section1')">Modifier</button>
                    <button class="btn btn-delete" onclick="toggleSection('section1')">Supprimer</button>
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
</body>
</html>
