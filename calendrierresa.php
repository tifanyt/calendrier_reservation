<!DOCTYPE html>
  <html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="" >
    
        <title> Réservations </title>
       
        <link href="css/site_projet.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Dekko" rel="stylesheet">
        <script src="js/resa.js"></script>

    </head>
    <body>

  
      
          <div id="entete_res">
            <div class="fixemenu">

            <a href="index.html" class="btn"> Retour à l'accueil</a>

            </div>
          </div>

          <div id="corps">
 
                <div id="grise_res">
                 
                  <h1 id="titre_reser">Réservations</h1>
                  <form  method ='post' action='send.php'>

                      Nom de l'équipe :
                      <input type="text" name="nomequipe" value=""/></br></br>
                      Nombre de joueur :
                      <input type="number" step="1" name="nbrjoueur" value="3" min="3" max="5"/></br></br>
                      Mail :
                      <input type="email" name="mail"/>
                     
                </div>


                <div id="bleu">

                        <p>
                        
                        <?php
                        $dt = new DateTime;
                        if (isset($_GET['year']) && isset($_GET['week'])) {
                            $dt->setISODate($_GET['year'], $_GET['week']);
                        } else {
                            $dt->setISODate($dt->format('o'), $dt->format('W'));
                        }
                        $year = $dt->format('o');
                        $week = $dt->format('W');
                       
                        ?>


                        <a class="a_week" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">  semaine précédente  </a> <!--Previous week-->
                        <a class="a_week" href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">  semaine suivante  </a> <!--Next week-->
                        </p>
                        
                        <div id="responsive_table">
                        
                        <table class="calendriertab">
                            <tr>
                                <?php

                                $propositionArray = array();

                                do {
                                    $nom_jour_fr = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
                                    $jourversionchiffre=$dt->format('w');
                                    $nom_mois_fr = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
                                    $moisvers=$dt->format('n');
                                    $moisversionchiffre=$moisvers-1;
                                    echo "<td>" . $nom_jour_fr[$jourversionchiffre] . "<br>" . $dt->format('d') . " " . $nom_mois_fr[$moisversionchiffre] . " " . $dt->format('Y') . "</td>\n";
                                
                                    $YYYY=$dt->format('Y');
                                    $MM=$dt->format('m');
                                    $DD=$dt->format('d');
                                    $formatdate=$YYYY . "-" . $MM . "-" . $DD;
                                    $treize=$formatdate . " " . "13:00:00";
                                    $quatorze=$formatdate . " " . "14:30:00";
                                    $seize=$formatdate . " " . "16:00:00";
                                    $dixsept=$formatdate . " " . "17:30:00";

                                    array_push($propositionArray, $treize, $quatorze, $seize, $dixsept);


                                    $dt->modify('+1 day');
                                } while ($week == $dt->format('W'));
                               
                              
                                  
                            echo " </tr>
                              <tr class='trheure'>
                                <td><input type='radio' data-hour='" . $propositionArray[0] . "' name='horaire' value='" . $propositionArray[0] . "'> 13h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[4] . "' name='horaire' value='" . $propositionArray[4] . "'>13h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[8] . "' name='horaire' value='" . $propositionArray[8] . "'>13h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[12] . "' name='horaire' value='" . $propositionArray[12] . "'>13h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[16] . "' name='horaire' value='" . $propositionArray[16] . "'>13h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[20] . "' name='horaire' value='" . $propositionArray[20] . "'>13h00</td>
                                <td id='dimanche'>   </td>
                              </tr>
                              <tr class='trheure'>
                                <td><input type='radio' data-hour='" . $propositionArray[1] . "' name='horaire' value='" . $propositionArray[1] . "'>14h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[5] . "' name='horaire' value='" . $propositionArray[5] . "'>14h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[9] . "' name='horaire' value='" . $propositionArray[9] . "'>14h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[13] . "' name='horaire' value='" . $propositionArray[13] . "'>14h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[17] . "' name='horaire' value='" . $propositionArray[17] . "'>14h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[21] . "' name='horaire' value='" . $propositionArray[21] . "'>14h30</td>
                                <td id='dimanche'>   </td>
                              </tr>
                              <tr class='trheure'>
                                <td><input type='radio' data-hour='" . $propositionArray[2] . "' name='horaire' value='" . $propositionArray[2] . "'>16h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[6] . "' name='horaire' value='" . $propositionArray[6] . "'>16h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[10] . "' name='horaire' value='" . $propositionArray[10] . "'>16h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[14] . "' name='horaire' value='" . $propositionArray[14] . "'>16h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[18] . "' name='horaire' value='" . $propositionArray[18] . "'>16h00</td>
                                <td><input type='radio' data-hour='" . $propositionArray[22] . "' name='horaire' value='" . $propositionArray[22] . "'>16h00</td>
                                <td id='dimanche'>   </td>
                              </tr>
                              <tr class='trheure'>
                                <td><input type='radio' data-hour='" . $propositionArray[3] . "' name='horaire' value='" . $propositionArray[3] . "'>17h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[7] . "' name='horaire' value='" . $propositionArray[7] . "'>17h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[11] . "' name='horaire' value='" . $propositionArray[11] . "'>17h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[15] . "' name='horaire' value='" . $propositionArray[15] . "'>17h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[19] . "' name='horaire' value='" . $propositionArray[19] . "'>17h30</td>
                                <td><input type='radio' data-hour='" . $propositionArray[23] . "' name='horaire' value='" . $propositionArray[23] . "'>17h30</td>
                                <td id='dimanche'>   </td>
                              </tr>";
                            
                            ?>
                           
                           
                        </table>
                      </div>

                           <input type="submit" name="send" value="Réserver" class="btn_reserver"/>
                            </form>

                </div>
        
                <div id="image_bas_res">
                </div>
        
          </div>
          

  <div id="footer">

<a href="https://www.facebook.com/AgenceLabequete/" target="blank" > <img src="img/facebook.png" height="50px"> </a>
<a href="https://www.instagram.com/labequete/?hl=fr" target="blank"> <img src="img/insta.png" height="50px"></a>

</div>  
    
  

</body>
</html>