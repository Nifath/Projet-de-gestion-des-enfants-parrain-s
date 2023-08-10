
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Génération et transmission des rapports trimestriels</title>
  <style>
  body {
      font-family: Arial, sans-serif;
      background-image: url("image14.jpg");
        background-size: cover;
        background-position: center;
       padding:20px
    }
    .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    
  
  }
  
  h1 {
    text-align: center;
  }
  
  form {
    margin-bottom: 20px;
  }
  
  label, select {
    display: block;
    margin-bottom: 10px;
  }
  
 
    button {
      padding: 10px 20px;
      background-color:#4c96af;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
 
  
  #report-container {
    margin-top: 20px;
  }
  </style>
</head>
<body>
  <div class="container">
    <h1>Génération des rapports trimestriels</h1>
    
    <form id="report-form" method="POST" action="rapportenreg.php">
      <label for="period">Sélectionnez la période :</label>
      <select id="period">
        <option value="">-- Choisissez une période --</option>
        <option value="trimestre1">Trimestre 1</option>
        <option value="trimestre2">Trimestre 2</option>
        <option value="trimestre3">Trimestre 3</option>
      </select>
      <label for="scannedDocuments">Documents scannés :</label>

          <input type="file" accept="image/*" id="scannedDocuments" name="scannedDocuments[]" multiple>
<br><br>
<button type="submit" name="submit" onclick="generatePDF()">Générer le rapport</button>
    </form>
    <div id="report-container">
      <!-- Le rapport généré et la liste des rapports transmis seront affichés ici -->
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
