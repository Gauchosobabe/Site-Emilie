<?php
// Si le formulaire a été soumis
if (isset($_POST["message"])) {

    
    $message = "Cette demande est envoyée depuis ton site internet
    Nom : " . $_POST["nom"] . "
    Email : " . $_POST["email"]. "
    Tel : " . $_POST["telephone"] . "
    Message : " . $_POST["message"];

$retour = mail("jppfeiffer@msn.com", "Demande de contact" , $message, "From:jppfeiffer@msn.com\r\nReply-to:" . $_POST["email"]);
    if ($retour) {
        echo "<p>L'email a bien été envoyé.</p>"
    }
}
?>