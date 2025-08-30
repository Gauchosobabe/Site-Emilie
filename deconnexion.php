<?php
// Démarrer la session pour y avoir accès
session_start();

// Supprimer toutes les variables de session
session_unset();

// Détruire la session elle-même
session_destroy();

// Rediriger l'utilisateur vers la page d'accueil
header("Location: index.php");

// Arrêter l'exécution du script pour s'assurer que la redirection se fait immédiatement
exit;
?>