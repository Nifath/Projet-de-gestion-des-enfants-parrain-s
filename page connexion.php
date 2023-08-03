<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min">


    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
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
            <div class="col-md-4 mx-auto">
            <h1 class="text-center text-muted mb-3 mt-5">Connexion</h1>
            <p class="text-center text-muted mb-5">Accedez à votre compte</p>
    
            <form  class="form" method='POST' action="connexion.php">

    
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control mb-3 @error('email') is-invalid @enderror" placeholder="abcd@gmail.com" required autocomplete="email" autofocus>
                 
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control mb-3 @error('password') is-invalid @enderror " required autocomplete="current-password">
               
            
    
                <div class="d-grid gap-2">
                <button class="btn btn-primary btn-block" type="submit">Se connecter</button>
                </div>
    
                <p class="text-center text-muted mt-5">Vous n'avez pas de compte? <a href="page inscription.php">Créer un compte</a></p>
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>