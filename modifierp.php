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
    background-image: url("image17.jpg");
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



button{
    width: fit-content;
    margin-bottom:20px;
    background-color: #2bc48a;
    padding: 5px 20px;
    color: #fff;
    display: flex;
    align-items: center;
    text-align: 0;
    border-radius: 6px;
    text-decoration: 0; 
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
    $id_dossier = $_GET['id']; // Récupérer l'ID depuis le lien

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

    // Calculer l'âge à partir de la date de naissance
    $birthDate = new DateTime($dateNaissance);
    $today = new DateTime();
    $age = $today->diff($birthDate)->y;

    echo "Age: " . $age; // Affiche l'âge calculé
echo "Query: " . $query; // Affiche la requête de mise à jour
     
if ($_FILES['photoProfil']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['photoProfil']['tmp_name'];
    $photoProfil = file_get_contents($tmp_name);

    // Requête de mise à jour sécurisée
    $query = "UPDATE dossier SET nom = '$nom', prenom = '$prenom', sexe = '$sexe', dateNaissance = '$dateNaissance', age = $age , lieuNaissance = '$lieuNaissance', nomPere = '$nomPere', nomMere = '$nomMere', nomTuteur = '$nomTuteur', classe = '$classe', etablissement = '$etablissement', dateParrainage = '$dateParrainage' , renseignement = '$renseignement' , photoProfil = ? WHERE id_dossier = $id_dossier";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $photoProfil);
    if (mysqli_stmt_execute($stmt)) {
    header("Location: listep.php");
    exit();
} else {
    $message = "Une erreur s'est produite lors de la modification.";
}
} else
{
    $query = "UPDATE dossier SET nom = '$nom', prenom = '$prenom', sexe = '$sexe', dateNaissance = '$dateNaissance', age = $age , lieuNaissance = '$lieuNaissance', nomPere = '$nomPere', nomMere = '$nomMere', nomTuteur = '$nomTuteur', classe = '$classe', etablissement = '$etablissement', dateParrainage = '$dateParrainage' , renseignement = '$renseignement'  WHERE id_dossier = $id_dossier";
if (mysqli_query($con, $query)) {
    header("Location: listep.php");
    exit();
} else {
    $message = "Une erreur s'est produite lors de la modification.";
}
}
}

// Récupérer les données de l'enfant
$id_dossier = $_GET['id'];
$req = mysqli_query($con, "SELECT * FROM dossier WHERE id_dossier = $id_dossier");
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
        <form action="" method="POST" enctype="multipart/form-data">

        <label for="photoProfil">Photo de profil :</label>
        <input type="file" id="photoProfil" name="photoProfil">


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
