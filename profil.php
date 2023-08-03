<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    
    <style type="text/css">
        body{
            background-color:  #92b5d1;
        }

        .profile-page {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .profile-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            margin-left: 20px;
        }

        .profile-info h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-info p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .profile-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center; /* or flex-start to align buttons to the left */
        }

        .profile-buttons button {
            padding: 10px 20px;
            background-color: #4c96af;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 60px;
        }

        .profile-buttons button:last-child {
            margin-right: 0;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-option {
            padding: 10px;
            cursor: pointer;
        }

        .dropdown-option:hover {
            background-color: #ddd;
        }

        body {
            background-image: url("image10.jpg");
            background-size: cover;
            background-position: center;
        }

        .profile-page h1 {
            color: red; 
        }

        .profile-page p {
            color: #ffffff; 
        }
        <style type="text/css">
    
    .profile-icons {
        margin-top: 30px;
        text-align: center;
    }

    .profile-icons a {
        color: #fff;
        font-size: 24px;
        margin: 0 10px;
    }

    .profile-icons {
            
            position: absolute;
            bottom: 20px; 
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
        }

        .profile-icons a {
            color: #fff;
            font-size: 24px;
            margin: 0 10px;
        }

        footer {
            padding: 80px 0px 70px 0px;
            border-top: 1px solid #ddd;
        }

        .logout-button {
    display: inline-block;
    background-color: #4c96af;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

.logout-button a {
    color: white;
    font-size: 10px;
    text-decoration: none;
}

.logout-button:hover {
    background-color: #3a7d9a;
}







</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

       
   
</head>
<body>
    
<header>
    
    <div class="logout-button">
        <a href="deconnexion.php">
            <i class="fa fa-sign-out"></i>
            Se déconnecter
        </a>
    </div>
</header>

    <div class="container-site">
        <div class="profile-page">
           
        </div>
        <div class="profile-page">
            <div class="profile-header">
                <div class="profile-picture">
                    <img src="https://www.caeb-benin.com/wp-content/uploads/2019/12/logo-300x300.png" alt="Photo de profil">
                </div>
                <div class="profile-info">
                <h1>Gestion des parrainages</h1>
                </div>
            </div>
            <div class="profile-buttons">
                <div class="dropdown">
                    <button class="dropdown-option">Dossier</button>
                    <div class="dropdown-content">
                        <p><a href="dossier nonpar.php">Nouvel enfant</a></p>
                        <p><a href="dossier parrainer.php">Nouveau parrainé</a></p>
                        <p><a href="dossier ancpar.php">Ancien parrainé</a></p>
                    </div>
                </div>
                <button class="generate-report-button" onclick="window.location.href = 'rapport.php';">Rapport</button>

                <div class="dropdown">
                    <button class="dropdown-option">Liste </button>
                    <div class="dropdown-content">
                        <p><a href="listenp.php">Non Parrainés</a></p>
                        <p><a href="listep.php">Nouveaux Parrainés</a></p>
                        <p><a href="listeap.php">Anciens Parrainés</a></p>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropdown-option">Search</button>
                    <div class="dropdown-content">
                        <p><a href="criteresnp.php">Enfants à parrainer</a></p>
                        <p><a href="criteresp.php">Enfants parrainés</a></p>
                        <p><a href="criteresap.php">Anciens Parrainés</a></p>
                    </div>
                </div>
            </div>
    <footer>
    <div class="container">
    <div class="profile-icons">
        <a href="https://www.facebook.com/Conseildesactiviteseducativesdubenin/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/CAEB80627616"><i class="fab fa-twitter"></i></a>
        <a href="https://www.youtube.com/channel/UC88-CxD1Sm_cg1fMv8OsfrA/?guided_help_flow=5"><i class="fab fa-youtube"></i></a>
    </div>
    </div>
    </footer>
        </div>
    </div>

</body>
</html>
