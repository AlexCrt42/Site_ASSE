<?php
// Configuration de la connexion à la base de données
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "postgres"; // Nom d'utilisateur MySQL
$motdepasse = ""; // Mot de passe MySQL
$basededonnees = "DragonBall"; // Nom de la base de données

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($connexion->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
$age = $_POST['age'];
$personnage_prefere = $_POST['personnage_prefere'];

// Exécution de la requête SQL pour insérer les données dans la table utilisateurs
$sql = "INSERT INTO login (nom, prenom, email, mot_de_passe, age, personnage_prefere) 
        VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$age', '$personnage_prefere')";

if ($connexion->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur lors de l'inscription : " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
