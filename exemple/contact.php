

<?php
    // S'il y des données de postées
    if ($_SERVER['REQUEST_METHOD']=='POST') {
     
      // (1) Code PHP pour traiter l'envoi de l'email
     
      // Récupération des variables et sécurisation des données
      $nom = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
      $objet = htmlentities($_POST['objet']);
      $mail = htmlentities($_POST['mail']);
      $message = htmlentities($_POST['message']);
     
      // Variables concernant l'email
     
      $destinataire = 'gomis393@gmail.com'; // Adresse email du webmaster (à personnaliser)
      $contenu = '<html><head><title> '.$objet.' </title></head><body>';
      $contenu .= '<p>Tu as un nouveau message !</p>';
      $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
      $contenu .= '<p><strong>Email</strong>: '.$mail.'</p>';
      $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
      $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)
     
      // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
      $headers = 'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
     
      // Envoyer l'email
      mail($destinataire, $objet, $contenu, $headers); // Fonction principale qui envoi l'email
      header("location:index.html"); // Afficher un message pour indiquer que le message a été envoyé
      // (2) Fin du code pour traiter l'envoi de l'email
    }
    ?>
<div class="formulaire">
                <p class="titresfooter">Formulaire</p>
                <?php include('formulaire.php'); ?>
                <form method="post" action="formulaire.php">
                    <p><input type="text" name="nom" placeholder=" Nom" required /></p>
                    <p><input type="email" name="mail" placeholder=" E-mail" required /></p>
                    <p><input type="text" name="objet" placeholder=" Objet" /></p>
              </div>
            <div class="message">
                     <p><textarea name="message" placeholder=" Message" required></textarea></p>
                    <input type="submit" value="Envoyer" />
                </form>
            </div>