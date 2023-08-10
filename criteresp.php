<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Recherche des critères des enfants parrainés</title>
    <style>
        body {
  background-image: url("image0.jpg");
  background-size: cover;
  background-position: center;
}

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 1px #ddd;
        }

        label {
            font-weight: bold;
        }
        button{
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="number"],
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"],
        button[type="reset"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"],
        button[type="reset"]:hover {
            background-color: #0056b3;
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
    <form method="POST" action="recherche_enfantsp.php">
        <div class="form-group">
        <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom(s):</label>
            <input type="text" id="prenom" name="prenom" class="form-control">
        </div>
        <div class="form-group">
            <label for="sexe">Sexe:</label>
            <select id="sexe" name="sexe" class="form-control">
                <option value="masculin">Masculin</option>
                <option value="feminin">Feminin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="classe">Classe:</label>
            <input type="text" id="classe" name="classe" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
        <button type="reset" class="btn btn-primary" onclick="goToAnotherPage()">Retour</button>
       
    </form>
   
    <script>
    function goToAnotherPage() {   
        window.location.href = "profil.php"; 
    }  
</script> 

</body>
</html>
