<?
require 'config/init.php'; 

// //**Req de modification produit */
if(isset($_GET["modifier"])){
    $id = $_GET['modifier']; 
    $name = $_GET['modifier']; 
    $prix = $_GET['modifier']; 
    $requete = "UPDATE FROM produit WHERE id = $id"; 
    $req = $pdo->prepare($requete);
    $req->execute(); 
}


if (isset($_POST['submitForm'])) {
    if ((empty($_POST['id']) && empty($_POST['date_de_creation']))) {
        $id = $_POST['id'];
        $date_de_creation = $_POST['date_de_creation'];
    } else {
        $id = $_GET['id'];
        $date_de_creation = $_GET['date_de_creation'];
    }
    if (empty($_POST['description']) || empty($_POST['prix'])) {
        $description = $_POST['description'];
        $prix = $_POST['prix'];
    }

    $requete = "UPDATE FROM produit WHERE id = $id"; 
    $req = $pdo->prepare($requete);
    $req->execute(); 
}
?>



<?php
include 'components/Head.html'; 
?>
<?php
include 'components/Header.html'; 
?>

/**creation form  */
<form action="modifier.php" method="POST" class="border border-primary border-4 m-2 w-50">
    <fieldset>
        <legend>
            Modifier un produit
        </legend>
    <div class="form-group p-3 pb-2">
    <div class="form-group pb-2">
            <label for="id">id: </label>
            <input type="hidden" name="id" value="id" >
            
        </div>

        <div class="form-group pb-2">
            <label for="image">Image: </label>
            <input type="image" src="../J5/doudou_bunny.jpeg" alt="peluche">
        </div>
        <div class="form-group pb-2"><br/>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-group pb-2"><br/>
            <label for="description">Description: </label>
            <input type="text" name="description" id="description">
        </div>
        <div class="form-group pb-2"><br/>
            <label for="prix">Prix: </label>
            <input type="number" name="prix" id="prix">
        </div>
        <div class="form-group pb-2">
            <label for="date_de_creation">Date de création: </label>
            <input type="hidden" name="date_de_creation" value="date_de_creation">  

        </div>
        <div class="form-group pb-2"><br/>
        <label for=""></label>
            <input type="submit" name= "submitForm"value="Modifier">
        </div>
     </div>
    </fieldset>
</form>


