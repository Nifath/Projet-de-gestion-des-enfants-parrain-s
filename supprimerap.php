<?php
 
     //connexion à la base de données
     $con = mysqli_connect("localhost","root","","caeb");
     if(!$con){
        echo "Vous n'êtes pas connecté à la base de donnée";
     }
  //récupération de l'id dans le lien
  $id_dossier1= $_GET['id'];
  //requête de suppression
  $req = mysqli_query($con , "DELETE FROM dossier2 WHERE id_dossier2 = $id_dossier2");
  //redirection vers la page index.php
  header("Location: listeap.php")
?>