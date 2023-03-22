<?php
// Vérifie si l'utilisateur a soumis le formulaire de connexion
if(isset($_POST['login_btn'])) {
    // Vérifie que l'email et le mot de passe ont été fournis
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=nom_de_la_base_de_données;charset=utf8', 'nom_utilisateur', 'mot_de_passe');

        // Requête préparée pour sélectionner l'utilisateur correspondant à l'email fourni
        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $stmt->execute([$_POST['email']]);
        $user = $stmt->fetch();

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if($user && password_verify($_POST['password'], $user['mot_de_passe'])) {
            // Authentification réussie, redirige l'utilisateur vers la page d'accueil
            header('Location: index.php');
            exit();
        } else {
            // Identifiants incorrects, affiche un message d'erreur
            $error_message = 'Identifiants incorrects';
        }
    } else {
        // Les champs email et/ou mot de passe sont vides, affiche un message d'erreur
        $error_message = 'Veuillez remplir tous les champs';
    }
}fdwxfwd