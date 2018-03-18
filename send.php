<!DOCTYPE html>

  <html>

    

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="" >

    

        <title> Confirmation </title>

        <link href="css/site_projet.css" rel="stylesheet" type="text/css"/>

        <link href="https://fonts.googleapis.com/css?family=Dekko" rel="stylesheet">

   



    </head>

    <body>


          <div id="entete_res">
          <div class="fixemenu">
          <a href="index.html" class="btn"> Retour à l'accueil</a>
          </div>
          </div>

          <div id="corps_send">

              <?php 

                  if(isset($_POST['send']) && isset($_POST['horaire']) && isset($_POST['nbrjoueur']) && isset($_POST['nomequipe']) && isset($_POST['mail'])){



                      $horaire=$_POST["horaire"];

                      $nbrjoueur=$_POST["nbrjoueur"];

                      $nomequipe=$_POST["nomequipe"];

                      $mail=$_POST["mail"];

                      $envoyeur = 'agencelabequete@gmail.com';

                      $sujet = 'Email de confirmation';

                      $message = "Bonjour !\r\n\r\n Merci pour votre réservation, celle-ci a bien été prise en compte.\r\n\r\n Cordialement,\r\n\r\n L'équipe Lab e-quête";

                      $headers = 'From: '.$envoyeur . "\r\n" .
                                  'Reply-To: '.$envoyeur. "\r\n" .
                                  'X-Mailer: PHP/' . phpversion();


                      $link = mysqli_connect("venus", "qroussel","", "qroussel");

                      $request= "INSERT INTO bouc_et_mystere_resa(nom_equipe, nombre_joueur, mail, horaire) VALUES ('$nomequipe','$nbrjoueur','$mail','$horaire')";

                      $sql = mysqli_query($link,$request);

                      if($sql){

                        echo "Félicitations ! Vous faites maintenant partie des candidats pour devenir membre de notre agence. Vous allez recevoir un mail de confirmation. <br>";
                        echo "<p id='rebours'>Pour des raisons de confidentialité, cette page web s'autodétruira dans <span id='compteur'>10</span> seconde(s)</p>";

                        $envoye = mail($mail, $sujet, $message, $headers);

                      }

                      else{

                        echo "Désolé, une erreur est survenu sur notre base données, merci de ressayer plus tard.";

                      }

                  }

                  else{

                    echo "Un champs est manquant, merci de réessayer." ; 

                  }

              ?>


<div id="image_bas_res">
          </div>

          </div>

     <div id="footer">

<a href="https://www.facebook.com/AgenceLabequete/" target="blank" > <img src="img/facebook.png" height="50px"> </a>
<a href="https://www.instagram.com/labequete/?hl=fr" target="blank"> <img src="img/insta.png" height="50px"></a>

</div>  

<script src="compteur.js"></script>

</body>

</html>