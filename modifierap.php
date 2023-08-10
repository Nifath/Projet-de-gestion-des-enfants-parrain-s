<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">

<style>
   

.form {
    background-image: url("image15.jpg");
    padding: 25px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 6px;
}

.form form {
    display: flex;
    flex-direction: column;
    max-width: 350px;
    margin: 0 auto;
}

.form label {
    margin-top: 10px;
    font-weight: bold;
}

.form input,
.form select,
.form textarea {
    padding: 8px;
    border: 1px solid #999;
    outline: 0;
    margin-top: 5px;
    border-radius: 4px;
    width: 100%;
}

.form input:focus,
.form select:focus,
.form textarea:focus {
    border: 1px solid #ffcb61;
}

.form select {
    margin-bottom: 10px;
}

.form textarea {
    resize: vertical;
}

.form input[type="submit"] {
    margin-top: 25px;
    background-color: #2bc48a;
    border: 1px solid #2bc48a;
    cursor: pointer;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
}

.form input[type="submit"]:hover {
    background-color: #28a17a;
}

/* Styles pour les messages d'erreur */

.form .erreur_message {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}

/* Styles pour le bouton "Retour" */

.form button {
    background-color: #e0e0e0;
    border: 1px solid #ccc;
    color: #333;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: bold;
    margin-bottom: 15px;
}

.form button:hover {
    background-color: #ccc;
}

</style>

</head>
<body>
<?php

// Connexion à la base de données
$con = mysqli_connect("localhost", "root", "", "caeb");
if (!$con) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}

$message = '';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_dossier2 = mysqli_real_escape_string($con, $_GET['id']);
 

    // Récupérer les données du formulaire
    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $sexe = $_POST['sexe']; 
    $dateNaissance = $_POST['dateNaissance'];
    $lieuNaissance = mysqli_real_escape_string($con, $_POST['lieuNaissance']);
    $nomPere = mysqli_real_escape_string($con, $_POST['nomPere']);
    $nomMere = mysqli_real_escape_string($con, $_POST['nomMere']);
    $nomTuteur = mysqli_real_escape_string($con, $_POST['nomTuteur']);
    $classe = mysqli_real_escape_string($con, $_POST['classe']);
    $etablissement = mysqli_real_escape_string($con, $_POST['etablissement']);
    $dateParrainage = $_POST['dateParrainage'];
    $renseignement = mysqli_real_escape_string($con, $_POST['renseignement']);
    $nomParrain = mysqli_real_escape_string($con, $_POST['nomParrain']);
    $contact = $_POST['contact']; 
    $adresse = $_POST['adresse'];
    $profession = mysqli_real_escape_string($con, $_POST['profession']);
    $lieu_de_travail = $_POST['lieu_de_travail']; 

    // Calculer l'âge à partir de la date de naissance
    $birthDate = new DateTime($dateNaissance);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;

    echo "Age: " . $age; // Affiche l'âge calculé
echo "Query: " . $query; // Affiche la requête de mise à jour


    // Requête de mise à jour sécurisée
    $query = "UPDATE dossier2 SET nom = '$nom', prenom = '$prenom', sexe = '$sexe', dateNaissance = '$dateNaissance', age = $age , lieuNaissance = '$lieuNaissance', nomPere = '$nomPere', nomMere = '$nomMere', nomTuteur = '$nomTuteur', classe = '$classe', etablissement = '$etablissement', dateParrainage = '$dateParrainage' , renseignement = '$renseignement' , nomParrain = '$nomParrain' , contact = '$contact' , adresse = '$adresse' , profession = '$profession' , lieu_de_travail = '$lieu_de_travail'  WHERE id_dossier2 = $id_dossier2";

    if (mysqli_query($con, $query)) {
        header("Location: listeap.php");
        exit();
    } else {
        $message = "Une erreur s'est produite lors de la modification.";
    }
}

// Récupérer les données de l'enfant
$id_dossier2 = $_GET['id'];
$req = mysqli_query($con, "SELECT * FROM dossier2 WHERE id_dossier2 = $id_dossier2");
$row = mysqli_fetch_assoc($req);
?>

    <div class="form">
        
    <button onclick="goToAnotherPage()">Retour</button>
        <center><h2>Modifier les informations de : <?=$row['nom']?> <?=$row['prenom']?></h2></center>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">

        <fieldset>
        <legend>Informations conservées</legend>
        <label for="name">Nom:</label>
          <input type="text" id="firstname" name="nom" value="<?=$row['nom']?>">

          <label for="name">Prenom(s):</label>
          <input type="text" id="lastname" name="prenom" value="<?=$row['prenom']?>">

          <label>Sexe :</label>
        <select id="sexe" name="sexe">
    <option value="Masculin" <?=($row['sexe'] === 'Masculin') ? 'selected' : ''?>>Masculin</option>
    <option value="Feminin" <?=($row['sexe'] === 'Feminin') ? 'selected' : ''?>>Feminin</option>
    </select>
            <label for="dateNaissance">Date de naissance:</label>
            <input type="date" id="dateNaissance" name="dateNaissance" value="<?=$row['dateNaissance']?>" max="<?php echo date('Y-m-d'); ?>" class="form-control">
          
            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" min="0" max="120" class="form-control age-input" value="<?= $age ?>" readonly>

          <label for="lieuNaissance">Lieu de naissance :</label>
          <input type="text" id="lieuNaissance" name="lieuNaissance" value="<?=$row['lieuNaissance']?>">
      
          <label for="nomPere" >Nom du père :</label>
          <input type="text" id="nomPere" name="nomPere" value="<?=$row['nomPere']?>">
      
          <label for="nomMere">Nom de la mère :</label>
          <input type="text" id="nomMere" name="nomMere" value="<?=$row['nomMere']?>">
      
          <label for="nomTuteur">Nom du tuteur :</label>
          <input type="text" id="nomTuteur" name="nomTuteur" value="<?=$row['nomTuteur']?>">
      
          <label for="classe">Classe :</label>
          <input type="text" id="classe" name="classe" value="<?=$row['classe']?>">
      
          <label for="etablissement">Établissement :</label>
          <input type="text" id="etablissement" name="etablissement" value="<?=$row['etablissement']?>">
           
          <label for="dateParrainage">Date de parrainage :</label>
          <input type="date" id="dateParrainage" name="dateParrainage" value="<?=$row['dateParrainage']?>"><br><br>

          <label for="renseignements">Renseignements justifiant le parrainage :</label><br>
         <textarea id="renseignements" name="renseignement" rows="4" cols="50"><?=$row['renseignement']?></textarea>
         </fieldset>
<fieldset>
    <legend>Nouvelles informations</legend>

    <label for="nomParraint">Nom du parrain :</label>
    <input type="text" id="nomParrain" name="nomParrain" value="<?=$row['nomParrain']?>"><br><br>

    <label for="contact">Contact :</label>
    <input type="text" id="contact" name="contact" value="<?=$row['contact']?>"><br><br>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" value="<?=$row['adresse']?>"><br><br>

    <label for="profession">Profession :</label>
    <input type="text" id="profession" name="profession" value="<?=$row['profession']?>"><br><br>

    <label for="lieu_de_travail">Lieu de travail :</label>
    <input type="text" id="lieu_de_travail" name="lieu_de_travail" value="<?=$row['lieu_de_travail']?>"><br><br>

   
</fieldset>
          <input type="submit" value="Modifier" name="button">
          
        </form>
    </div>

    <script>
    function goToAnotherPage() {   
        window.location.href = "listep.php"; 
    } 
</script>   
</body>
</html>
