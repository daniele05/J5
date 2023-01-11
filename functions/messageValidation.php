<?php
/**function messageValidation */

function messageValidation($tab)
{
        echo '<div>';
        foreach($tab as $t){
         echo'<p class="text-primary">'.$t.'</p>';
        }   
        echo'</div>';
 }

?>