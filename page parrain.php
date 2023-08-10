<?php
try {
    $dsn = "mysql:host=localhost;dbname=caeb;charset=utf8";
    $username = "root";
    $password = "";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué: " . $e->getMessage());
}

$enfantsParraines = array();

// Code pour récupérer les informations sur les enfants parrainés par le parrain (remplacez par le code de recherche approprié)
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Exemple de requête SQL pour récupérer les informations des enfants parrainés par le parrain
    $query = "SELECT * FROM dossier WHERE nom = :nom AND prenom = :prenom";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['nom' => $nom, 'prenom' => $prenom]);
    $enfantsParraines = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Recherche des enfants parrainés</title>
    <style>
        body {
            background-image: url("image0.jpg");
            background-size: cover;
            background-position: center;
            padding:20px
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 1px #ddd;
            margin-top: 50px;
        }

        
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    input[type="text"]
     {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
   
    .custom-btn {
        background-color: #4c96af; 
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        padding: 10px 20px;
    }
        .results {
            margin-top: 20px;
        }
    </style>

</head>
<body>
<div class="container">
        <div class="row justify-content-center"> 
             
                <form method="POST" action="#">
                    
                            <label for="nom">Nom:</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                       <div>
                            <label for="prenom">Prénom(s):</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary custom-btn">Rechercher</button>
                    <button type="submit" class="btn btn-primary" onclick="goToAnotherPage()">Retour</button>
                    
                </form>
        
                <script>
                     function goToAnotherPage() {   
        window.location.href = "index.php"; 
    
    }
    
                </script>

        <?php if (!empty($enfantsParraines)): ?>
            <h2 class="mt-4">Résultats de la Recherche :</h2>
            <ul>
                <?php foreach ($enfantsParraines as $enfant): ?>
                <li>
                    Nom  : <?php echo $enfant['nom']; ?><br>
                    Prénom(s) : <?php echo $enfant['prenom']; ?><br>
                    Date de Naissance : <?php echo $enfant['dateNaissance']; ?><br>
                    Sexe:<?php echo $enfant['sexe']; ?><br>
                    LieuNaissance:<?php echo $enfant['lieuNaissance']; ?><br>
                    Nom du père:<?php echo $enfant['nomPere']; ?><br>
                    Nom de la mère:<?php echo $enfant['nomMere']; ?><br>
                    Nom du tuteur:<?php echo $enfant['nomTuteur']; ?><br>
                    Classe : <?php echo $enfant['classe']; ?><br>
                    Etablissement:<?php echo $enfant['etablissement']; ?><br>
                    Renseignement:<?php echo $enfant['renseignement']; ?><br>

                    <button>Voir plus</button>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php elseif (isset($_POST['submit'])): ?>
            <p>Aucun enfant trouvé avec ces nom et prénom.</p>
        <?php endif; ?>
    </div>
</body>
</html>
