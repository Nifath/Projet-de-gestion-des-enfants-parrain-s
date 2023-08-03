<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css"> 
    <title>CS.com</title>
<style>
  main{
    background-color: skyblue;
  }
  main p{
    color:black
  }
  .topbar {
    background-color: skyblue; /* Remplacez par la couleur souhaitée */
    color: white; 
  }
    </style>
</head>
<body>
  
<header class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <img src="logo.png" alt="Venue Logo" style="width: 120px;">
                </div>
                <a href="#" class="topbar-logo"> CAEB <br> (Conseil des Activités Educatives du Bénin) <br> </a>
                <nav class="sidebar">
                    <a href="#" class="sidebar-home active"> Acceuil </a>
                    <a href="page inscription.php" class="sidebar-Inscription"> Inscription </a>
                    <a href="#" class="sidebar-contact dropdown-option"> Contacts
                        <select class="dropdown-list" id="social-media-select">
                            <option value="#">--Sélectionnez un réseau social--</option>
                            <option value="https://www.facebook.com/Conseildesactiviteseducativesdubenin/">Facebook</option>
                            <option value="https://twitter.com/CAEB80627616">Twitter</option>
                            <option value="https://www.youtube.com/channel/UC88-CxD1Sm_cg1fMv8OsfrA/?guided_help_flow=5">YouTube</option>
                        </select>
                    </a>
                    <a href="https://www.caeb-benin.com/" class="sidebar-Informations">  A propos </a>
                    <a href="#" class="sidebear-identite dropdown-option">Identité
                        <select class="dropdown-list" id="identite-select">
                            <option value="#">---Vous êtes---</option>
                            <option value="page connexion.php">Equipe de parrainage</option>
                            <option value="page parrain.php">Parrain</option> 
                        </select>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
    <section class="banner" id="top" style="background-image: url(image1.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Bienvenue sur Children Sponsorship du CAEB. </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="left-content">
                            <br>
                            <h4>Le parrainage d'enfants.</h4>
                            <p>Le parrainage d’enfants est un projet mis en place de 1992 par le CAEB. Son but est de d’aider les enfants en situation difficile afin de les inscrire ou les maintenir dans le système scolaire ou dans une formation professionnelle. Cette action est menée grâce au financement de Solidarité Laïque, des parrains espagnols et de la Fondation Claudine TALON.</p>
                           
                        </div>
                    </div>
                    <div class="image-slider">
                        
                            <div class="image-container">
                            <img src="image2.jpeg" alt="Image 1">
                                <img src="image8.png" alt="Image 2">
                                <img src="image3.jpeg" alt="Image 3">
                                <img src="image5.png" alt="Image 3">
                                <img src="image7.png" alt="Image 3">
                              
                              </div>
                        
                       
                      </div>
                      
                </div>
            </div>
        </section>
       </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script>
        document.getElementById("social-media-select").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption !== "#") {
                window.location.href = selectedOption;
            }
        });
        document.getElementById("identite-select").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption !== "#") {
                window.location.href = selectedOption;
            }
        });
    </script>



</body>
</html>