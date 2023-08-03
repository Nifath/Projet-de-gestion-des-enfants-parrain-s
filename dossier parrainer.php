<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class="create-dossier-page">
    <title>Creation de dossiers</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>

 
  
    <style type="text/css">
      
      .form-control .age-input {
    width: 200px; 
  }
 
      body {
      font-family: Arial, sans-serif;
      background-image: url("image0.jpg");
        background-size: cover;
        background-position: center;
       padding:20px
    }
    .logo {
  text-align: center;
  margin-bottom: -50px;
  
}

    h1 {
      text-align: center;
      color: #333;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #333;
    }

    input[type="text"],
    input[type="date"],
    input[type="number"]
    textarea {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 20px;
      background-color:#4c96af;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    </style>
</head>
<body>
<header class="topbar">
        <div class="col-md-12">
         <div class="logo">
                <img src="logo.png" alt="Venue Logo" style="width: 120px;">
            </div>
    </header>
    <div class="create-dossier-page">
    <h1>Dossier</h1>
        <form id="dossier-form" action="dossierp.php" method="POST" enctype="multipart/form-data">
       
        
        <div class="photo-profil">
        <label for="photoProfil">Photo de profil :</label>
        <input type="file" id="photoProfil" name="photoProfil" required>

        </div>
    
            <label for="name">Nom:</label>
          <input type="text" id="firstname" name="lastname"><br><br>

          <label for="name">Prenom(s):</label>
          <input type="text" id="lastname" name="firstname"><br><br>

          <label for="sexe">Sexe :</label>
          <select id="sexe" name="sexe">
            <option value="masculin">Masculin</option>
            <option value="feminin">Feminin</option>
          </select><br><br>
      
          
            <label for="dateNaissance">Date de naissance:</label>
            <input type="date" id="dateNaissance" name="dateNaissance" max="<?php echo date('Y-m-d'); ?>" class="form-control">
       
       
            <label for="age">Âge:</label>
            <input type="number" id="age" name="age" min="0" max="120" class="form-control age-input" readonly>
     
      
          <label for="lieuNaissance">Lieu de naissance :</label>
          <input type="text" id="lieuNaissance" name="lieuNaissance"><br><br>
      
          <label for="nomPere">Nom du père :</label>
          <input type="text" id="nomPere" name="nomPere"><br><br>
      
          <label for="nomMere">Nom de la mère :</label>
          <input type="text" id="nomMere" name="nomMere"><br><br>
      
          <label for="nomTuteur">Nom du tuteur :</label>
          <input type="text" id="nomTuteur" name="nomTuteur"><br><br>
      
          <label for="classe">Classe :</label>
          <input type="text" id="classe" name="classe"><br><br>
      
          <label for="etablissement">Établissement :</label>
          <input type="text" id="etablissement" name="etablissement"><br><br>
      
          <label for="dateParrainage">Date de parrainage :</label>
          <input type="date" id="dateParrainage" name="dateParrainage"><br><br>
      
          <label for="renseignements">Renseignements justifiant le parrainage :</label><br>
          <textarea id="renseignements" name="renseignements" rows="4" cols="50"></textarea><br><br>
      
          <label for="scannedDocuments">Documents scannés :</label>

          <input type="file" accept="image/*" id="scannedDocuments" name="scannedDocuments[]" multiple>
<br><br>

    <button type="submit" name="submit" onclick="generatePDF()">Enregistrer et Générer PDF</button>
    <button onclick="goBack()" type="reset" name="reset" >Retour</button>
        </form>
        
      </div>
     

<script>
 function goBack() {
        window.history.back(); 
    }  
    
 document.getElementById("dateNaissance").addEventListener("change", function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var monthDiff = today.getMonth() - dob.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            
            document.getElementById("age").value = age;
        });
    
</script>
 
</body>
</html>

