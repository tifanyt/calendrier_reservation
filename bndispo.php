<?php
   
    
  $link = mysqli_connect("venus", "ttessier","", "ttessier");
    
   
    if ($link->connect_error) {
        die('Connect Error (' . $link->connect_errno . ') '
                . $link->connect_error);
        echo"Désolée une erreur est survenue";
    }
    else{
        $dispo="SELECT horaire FROM bouc_et_mystere_resa";   
       
    }        
    $sql = mysqli_query($link,$dispo);

    $dispoArray = array();
   
    
   while( $ligne=mysqli_fetch_array($sql,MYSQLI_NUM)){
          array_push($dispoArray, $ligne[0]);
          
   }
    

  
  
   $dispoJSON = json_encode($dispoArray);
echo $dispoJSON;
   
?>