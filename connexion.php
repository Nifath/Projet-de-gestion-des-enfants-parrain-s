<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caeb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs du formulaire
    $email = $_POST["email"];
    $user_password = $_POST["password"];
    
    // Requête SQL pour vérifier les informations d'identification
    $sql = "SELECT * FROM chargee WHERE email = '$email' AND user_password = '$user_password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Authentification réussie
        session_start();
        $_SESSION["email"] = $email;
        header("Location: profil.php");
        exit;
        
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>