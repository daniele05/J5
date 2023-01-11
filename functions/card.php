
<?php
/**
 * Créer une fonction card() qui prend en paramètre les informations d'un produit et affiche une   
 * affichette avec sa photo et ses informations (titre, prix, description, date de création).
 */

 function card(int $id, string $image, string $titre, string $description,int $prix, string $date_de_creation){
    echo'<div>';
    echo '<div><img src= "'.$image.'"></div>'; 
    echo '<div>'.$titre.'</div>'.'<div>'.$prix.'</div>'.'<div>'.$description.'</div>'.'<div>'.$date_de_creation.'</div>'; 
    
    echo'<a href="index.php?delete='.$id.'"><input type="button" value="supprimer"></a>

         <a href="modifier.php?modifier='.$id.'"><input type="button" value="modifier"></a>
    </div>';
 }
?>

  