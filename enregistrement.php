<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "caeb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$user_password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Vérification du mot de passe
if ($user_password !== $confirmPassword) {
    echo 'Les mots de passe ne correspondent pas.';
    exit;
}


// Préparer et exécuter la requête d'insertion avec des paramètres liés
$stmt = $conn->prepare("INSERT INTO chargee (firstname, lastname, email, user_password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $user_password);

if ($stmt->execute()) {
    // Authentification réussie
    session_start();
    $_SESSION["email"] = $email;
    header("Location: page connexion.php");
    exit;
} else {
    echo "Erreur lors de l'insertion des données : " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>
