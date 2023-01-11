<?php
/**
 * function message Erreur
 */

 function messageErreur($tab)
 {
         echo '<div>';
         foreach($tab as $t){
          echo'<p class="text-danger">'.$t.'</p>';
         }   
         echo'</div>';
  }

?>