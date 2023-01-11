<?php
require 'config/init.php';

include 'functions/messageValidation.php'; 
include 'functions/messageErreur.php'; 
?>
<?php
/**requete a la bdd */



$tabValidation = []; 
$tabErreur = []; 
if(isset($_POST['submitFormulaire'])){
    echo'Formulaire envoyé'; 
    if(!(empty($_POST['name']) || empty($_POST["description"]) || empty($_POST['prix']))){
        $name = ($_POST['name']); 
        $description = ($_POST["description"]); 
        $prix = ($_POST['prix']); 
        // echo 'Formulaire traité'; 
    //    $requete = "SELECT * FROM formation_php WHERE (name = '$name') OR (description = '$description') OR (prix = $prix)";
    //    $req = $pdo->prepare($requete);
    //    $req->execute();



        $requete = "INSERT INTO produit (name, description, prix) VALUES ('$name', '$description', $prix)"; 
        // prepare requete 
        $req = $pdo-> prepare($requete); 
        // excution de la req 
       $req->execute(); 
       
       
    }else{
        array_push($tabErreur,'remplir tous les champs' ) ; 
    }
}
?>

<?php 
include 'components/Head.html';
?>

    <title>Titre de la page</title>
    
<?php

include 'components/Header.html';

messageValidation($tabValidation); 
messageErreur($tabErreur); 
?>


/**
*Créez un formulaire permettant d'insérer un nouveau produit dans la base de données
*/

<form action="creer.php" method="POST" class="border border-primary border-4 m-2 w-50">
    <fieldset>
        <legend>
            Insertion nouveau produit
        </legend>
    <div class="form-group w-25 p-3">
        <div class="form-group pb-2">
            <label for="image">Image: </label>
            <input type="image" src="../J5/doudou_bunny.jpeg" alt="peluche">
        </div>
        <div class="form-group pb-2">
            <label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        <div class="form-group pb-2">
            <label for="description">Description: </label>
            <input type="text" name="description">
        </div>
        <div class="form-group pb-2">
            <label for="prix">Prix: </label>
            <input type="number" name="prix">
        </div>
        <div class="form-group pb-2">
            <input type="submit" name= "submitFormulaire"value="Envoyer">
        </div>
     </div>
    </fieldset>
</form>
<?php
include 'components/Footer.html';
?>