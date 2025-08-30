<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>
    <header>
        <div class="utilisateur" ><img src="image/user.png" alt=""></div>
        <div class="bienvenue">
         <?php
       
        include 'database.php';
        global $db;

        if (isset($_SESSION['pseudo'])) {
            echo '<h1>Bonjour, ' . htmlspecialchars($_SESSION['pseudo']) . ' !</h1>';
        } else {
            echo '<h1>Bienvenue sur notre site !</h1>';
        }
        ?></div>
        <nav class="navbar">
            
        <ul>
         
            <?php
        
        if (isset($_SESSION['pseudo'])) {
            // Si l'utilisateur est connecté, afficher le lien de déconnexion
            echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
        } else {
            // Si l'utilisateur n'est pas connecté, afficher le lien "Mon compte"
            echo '<li><a href="login.php">Mon compte</a></li>';
        }
        ?>
            <li> Programme</li> 
            <li>A propos de moi</li>
            

        </ul>
  
            <img src="image/barre-de-menu.png" alt="" class="hamburger">

</nav>
    </header>
    <div class="container">
        <div class="titre">
        <h2>Moment fort</h2></div>
        <div class="fort">
        <img src="image/fond5.jpg" alt="" id="slide">
        <p class="fanta" id="fantaText">Mon arrivée dans le mon fantastique</p>
        <div id="precedent" onclick="ChangeSlide(-1)">&lt;</div>
        <div id="suivant" onclick="ChangeSlide(1)">&gt;</div>
        <button class="slider-button" id="button1" onclick="changeImage5()"></button>
        <button class="slider-button" id="button2" onclick="changeImage6()"></button>
        <button class="slider-button" id="button3" onclick="changeImage7()"></button>
        </div>
</div>

<div class="histoire">

<h3>Une histoire de dingue!!</h3><br>
<p>
Après avoir assé le poprtail, je suis tombé sur ce monde magnifique. Des mmontagnes, une grande rivièes, des couleurs à couper le souffle. Et puis ces Iles dans le ciel avec ces habitants si sympathique et chaleureux.
Mais ce que je ne savais pas c'est que ce monde était surveillé par une puissance occulte. Un oeil géant qui peut tout observer.
MMon arrivée ne lui a clairemment pas plu et le mmonde est devenue sommbre et flippant. On m'a conseillé de me cacher mais le onde devenait de plus en plus hostile envers moi.
Heureusement, il n'était pas le seul à me surveiller. Etait-ce un vaisseau ? un être vivant ? dans tous les cas il était libre de penser. Il fut d'un grand réconfort dans un premmier temps puis d'une aide précieuse dans un 
second. Il me cachait et me permmis de revenir dans notre onde à nous. 

Mais ce monde est encore en danger et j'ai besoin de vous afin d'aller combattre cet oeil maléfique qui asservis ce si beau mmonde.
Venais avec moi, mmais avant tout choisissais votre équipement.
Grace à notre être pensant et technologique, nous pourrons avoir différents équipemments.
Nous avons besoin de classes différentes afin de mamximiser nos compétences afin d'aller combattre l'oeil.

</p><br>
<h4>Merci à vous et allons y !!!!</h4>

</div>

<div class="perso">
<label for="classe">Choisissez votre classe:</label>
<select id="classe" name="classe">
  <option value="TANK" id="TANK">TANK</option>
  <option value="SOIGNEUR" id="SOIGNEUR">SOIGNEUR</option>
  <option value="MAGIQUE" id="MAGIQUE">DEGAT MAGIQUE</option>
  <option value="CAC" id="CAC">DEGAT PHYSIQUE (CORPS A CORPS)</option>
  <option value="HUNT" id="HUNT">DEGAT PHYSIQUE(DISTANCE)</option>
</select>


<p class="choisie">
  Votre classe choisie est : <span id="classe-choisie"></span>
</p></div>
<script>
const selectClasse = document.getElementById('classe');
const affichageClasse = document.getElementById('classe-choisie');

selectClasse.addEventListener('change', (event) => {
  const valeurSelectionnee = event.target.value;
  const texteSelectionne = event.target.options[event.target.selectedIndex].text;

  affichageClasse.className = '';

 
  if (valeurSelectionnee === 'TANK') {
    affichageClasse.classList.add('couleur-TANK');
  } else if (valeurSelectionnee === 'SOIGNEUR') {
    affichageClasse.classList.add('couleur-SOIGNEUR');
  }
  else if (valeurSelectionnee === 'MAGIQUE') {
    affichageClasse.classList.add('couleur-MAGIQUE');
  }
  else if (valeurSelectionnee === 'CAC') {
    affichageClasse.classList.add('couleur-CAC');
  }
   else if (valeurSelectionnee === 'HUNT') {
    affichageClasse.classList.add('couleur-HUNT');
  }

  affichageClasse.textContent = texteSelectionne;
});

selectClasse.dispatchEvent(new Event('change'));
</script>






<script>
    const texte = ["Mon arrivée dans le monde fantastique", "L'oeil m'observe, tout devient noir", "Un sauveur inespéré"]
    const slide = ["fond5.jpg", "fond6.jpg", "fond7.jpg"];
            let numero = 0;
            let code= 0;

            function ChangeSlide(sens) {
            code = code + sens;
            if (code > texte.length -1)
            code = 0;
            if (code < 0)
            code = texte.length -1;
            document.getElementById("fantaText").textContent = texte[code];



            numero = numero + sens;
            if (numero > slide.length -1)
            numero = 0;
            if (numero < 0)
            numero = slide.length -1;
            document.getElementById("slide").src = "image/" + slide[numero];
            
        }


</script>
<script>
    const image5 =  "image/fond5.jpg" 
    const texte5 = "Mon arrivée dans le monde fantastique"
    function changeImage5(){
       const myImageElement = document.getElementById("slide");
       const myTextElemment = document.getElementById("fantaText");
       if(myImageElement){
        myImageElement.src = image5;
       }
       if(myTextElemment){
        myTextElemment.textContent = texte5;
       }
    }
</script>
<script>
    const image6 =  "image/fond6.jpg" 
    const texte6 = "L'oeil m'observe, tout devient noir"
    function changeImage6(){
       const myImageElement = document.getElementById("slide");
       const myTextElemment = document.getElementById("fantaText");
       if(myImageElement){
        myImageElement.src = image6;
       }
       if(myTextElemment){
        myTextElemment.textContent = texte6;
       }
    }
</script>
<script>
    const image7 =  "image/fond7.jpg" 
    const texte7 = "Un sauveur inespéré"
    function changeImage7(){
       const myImageElement = document.getElementById("slide");
       const myTextElemment = document.getElementById("fantaText");
       if(myImageElement){
        myImageElement.src = image7;
       }
       if(myTextElemment){
        myTextElemment.textContent = texte7;
       }
    }
</script>
</body>
</html>