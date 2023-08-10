<?php

session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'caeb');

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupération de la liste des étudiants
$instruct = $conn->prepare('SELECT * FROM dossier2');
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
        
        .btn-edit {
            background-color: #2196F3;
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
        
        .btn-delete {
            background-color: #f44336;
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
        
        

        .Btn_add {
    width: fit-content;
    margin-bottom:20px;
    background-color: black;
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
    background-color:black;
    padding: 5px 20px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0; 
}

.btn-view, .btn-edit, .btn-delete {
    display: inline-block;
     margin: 10px;
        padding: 5px 10px; 
    }
    </style>
</head>
<body>
    <center>
        <h1>Anciens parrainés</h1>
    </center>
    <a href="dossier ancpar.php" class="Btn_add"> Ajouter</a>
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
                <a   class="btn-view" href="voirap.php?id=<?=$row['id_dossier2']?>">Voir</a>
                <a   class="btn-edit" href="modifierap.php?id=<?=$row['id_dossier2']?>">Modifier</a>
                <a   class="btn-delete" href="supprimerap.php?id=<?=$row['id_dossier2']?>">Supprimer</a>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>  
    <button onclick="goToAnotherPage()">Retour</button>


<script>
    function goToAnotherPage() {   
        window.location.href = "profil.php";
    
    } 
</script>   
</body>
</html>
