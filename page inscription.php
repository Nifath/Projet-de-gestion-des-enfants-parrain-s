<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min">
    
    <link rel="stylesheet" href="inscription.css">
    <title>Inscription</title>
    <style>
        body {
  background-image: url("image0.jpg");
  background-size: cover;
  background-position: center;
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
<div class="container" class="col-md-4 mx-auto" id="formulaire-container">
  
    <div class="row">
        <div class="col-md-5 mx-auto">
            <h1 class="text-center mb-3 mt-5">Inscrivez-vous</h1>
            
        <form method="POST" action="enregistrement.php" class="row g-3" id="form-register">
           
            <div class="col-md-6">
              <label for="firstname" class="form-label">Nom</label>
              <input type="text" class="form-control" id="firstname" name="firstname"  required autocomplete="firstname"  autofocus>
              <small class="text-danger fw-bold" id="error-register-firstname"></small>
            </div>

            <div class="col-md-6">
              <label for="lastname" class="form-label">Prénom(s)</label>
              <input type="text" class="form-control" id="lastname" name="lastname"  required autocomplete="lastname"  autofocus>
              <small class="text-danger fw-bold" id="error-register-lastname"></small>
            </div>

            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required autocomplete="email"  autofocus>
              <small class="text-danger fw-bold" id="error-register-email"></small>
            </div>

            <div class="col-md-6">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" required autocomplete="password"  autofocus>
              <small class="text-danger fw-bold" id="error-register-password"></small>
            </div>

            <div class="col-md-6">
              <label for="confirmPassword" class="form-label">Confirmez le mot de passe</label>
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required autocomplete="confirmPassword"  autofocus>
              <small class="text-danger fw-bold" id="error-register-password-confirm"></small>
            </div>
        
            <div class="d-grid gap-2">
                 <button class="btn btn-primary" type="submit" id="register-user">S'inscrire</button>
                 <button class="btn btn-primary" type="reset" id="register-user-reset" onclick="redirectToHomepage()"> Quitter </button>
            </div>

            <p class="text-center text-muted mt-5" >Vous avez déja un compte?<a href="page connexion.php">Se connecter</a></p>

            
        </form>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
  function redirectToHomepage() {
      window.location.href = "index.php"; 
  }
  
</script>


</body>
</html>