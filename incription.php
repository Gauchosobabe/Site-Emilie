
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire inscripption</title>
    <link rel="stylesheet" href="style2.css">
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
    <div class="sinscrire">
    <h1>S'inscrire maintenant</h1>

<div class="formulaire">

<div class="email"><label for="email" ></label>
<input type="text" class="mail" placeholder="Email" name="email" required></div>

<div class="pseudo"><label for="pseudo" ></label>
<input type="text" class="cpseudo" placeholder="Votre pseudo" name="pseudo" required></div>

<div class="mdp"><label for="mot de passe" ></label>
<input type="password" class="password" placeholder="Mot de passe" name="password" required></div>

<div class="cmdp"><label for="mot de passe" ></label>
<input type="password" class="cpassword" placeholder="Confirmez le mot de passe" name="cpassword" required></div>


<div class="envoyer"><button type="submit" name="envoyer">Envoyer</button>
</div>
</div> 
</div></form>

<?php 
include 'database.php';
global $db;

if(isset($_POST['envoyer'])){
       
    $email = $_POST['email'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $password = $_POST['password'] ?? '';
    $cpassword= $_POST['cpassword'] ?? '';


    if(!empty($email) && !empty($pseudo) && !empty($password) && !empty($cpassword)){
       
        if($password== $cpassword){
       

            $passwordhache = password_hash($password, PASSWORD_DEFAULT);

                $c = $db->prepare("SELECT email FROM users WHERE email = :email");
                $c->execute(['email' => $email]);     
                $result =$c->rowCount();      
                
        if($result == 0){
            $q = $db->prepare("INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)");
                 $q->execute([
                'pseudo' =>$pseudo,
                'email' =>$email,
                'password' => $passwordhache
                ]);
                echo "<div class='success-message'>Le compte a été créé avec succès !</div>";
        }
         else{
    echo "un email existe déjà !";
   }
        }
  
}

    }


    





?>
</body>
</html>