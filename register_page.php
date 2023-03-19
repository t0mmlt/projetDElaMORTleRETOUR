<?php
// Connexion à la base de données MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "power tycoon";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si la connexion a réussi
if ($conn->connect_error) {
  die("Erreur de connexion à la base de données: " . $conn->connect_error);
}

// Récupérer les données soumises par le formulaire
$email = $_POST["email"];
$passwordUn = $_POST["passwordUn"];
$passwordDe = $_POST["passwordDe"];

// Vérifier que les mots de passe sont identiques
if ($passwordUn !== $passwordDe) {
  die("Les mots de passe ne correspondent pas");
}

// Hasher le mot de passe pour des raisons de sécurité
$hashed_password = password_hash($passwordUn, PASSWORD_DEFAULT);

// Insérer les données dans la table d'utilisateurs de la base de données
$stmt = $conn->prepare("INSERT INTO 'users' ('email', 'password') VALUES ('text', 'mdp')");
$stmt->bind_param("ss", $email, $hashed_password);

if ($stmt->execute() === TRUE) {
  echo "Compte créé avec succès!";
} else {
  echo "Erreur lors de la création du compte: " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();
?>