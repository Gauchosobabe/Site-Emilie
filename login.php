<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>

<nav class="navbar">
        <ul>
            <li><a href="index.php">Accueil</a> </li>
            <li> Programme</li> 
            <li>A propos de moi</li>
            <li> <img src="image/barre-de-menu.png" alt="" class="hamburger"></li>

        </ul>

</nav>
    <form method="post">
    <div class="login">
    <h1>Connexion</h1>

    <div class="formulaire">

<div class="email"><label for="email" ></label>
<input type="text" class="mail" placeholder="Email" name="email"></div>

<div class="mdp"><label for="password" ></label>
<input type="password" class="password" placeholder="Mot de passe" name="password"></div>

<a href="#" class="oubli">Mot de passe oublié ?</a>

<div class="connexion"><button name="submit">Connexion</button>
<span class="validation">&#10003;</span></div>
</div>

    <div class="nocompte">
        <span class="pascompte">Je n'ai pas de compte? </span>
        <a href="incription.php"><span class="inscrire">S'inscrire maintenant </span></a>
    </div>
</div></form>


<?php 
session_start();
include 'database.php';
global $db;

if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

        $q = $db->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $email]);
        $result = $q->fetch();

        if($result ==true){

            if(password_verify($password, $result['password'])){
                echo "Connexion en cours";
                $_SESSION['pseudo'] = $result['pseudo'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['is_admin'] = $result['is_admin'];

                if($result['is_admin'] == 1){
                    header('Location: admin.php'); 
                    exit; 
                }
                else{
                header('Location: index.php'); 
                    exit; 
                }
            }
            else{
                echo "L'email ou le mot de passe est inccorect";
            }
        }
}
else{
echo "verillezz remplir les champs";
    }}


    





?>


</body>
</html>