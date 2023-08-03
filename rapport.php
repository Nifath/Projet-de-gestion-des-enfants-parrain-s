<?php

session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupération de la liste des étudiants
$instruct = $conn->prepare('SELECT * FROM dossier1');
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
            border-bottom: 0.5px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            background-color: #4CAF50;

            
        }
        
    </style>
</head>
<body>
    <center>
        <h1>Enfants parrainés</h1>
    </center>
    <table>
        <thead>
            <tr>
                
                <th>Nom</th>
                <th>Prenom(s)</th>
                <th>Action</th>
               
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
            <tr>
                
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
               <td>
               <button class="generate-report-button" onclick="window.location.href = 'constituer_rapport.php';">Constituer rapport</button>

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
