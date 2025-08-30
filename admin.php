<?php
session_start();


if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
 
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue, administrateur !</h1>
    <p>Ceci est un contenu réservé aux administrateurs.</p>
</body>
</html>