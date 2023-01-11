<!--
Contenu de la page, fonctions d'affichage
-->
<?php
 require 'config/init.php'; 

 include 'functions/card.php'; 
?>

<!-- bouton deconnection -->
<div>
  <?php if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] !== null):
  ?>
      <a href="?deconnexion=1">Deconnexion</a>
      <?php else : ?>
        <a href="/connexion.php">Connexion</a>
        <?php endif; ?>
</div>


<?php

// Suppression de produit

if(isset($_GET["delete"])){
  $id = $_GET["delete"]; 
  $requete = "DELETE FROM produit WHERE id = $id"; 
$req = $pdo->prepare($requete); 
$req->execute(); 
echo'produit supprimer avec succès'; 
}



/** recuperation donnees produits de la b2d formation_php*/ 
$requete = "SELECT * FROM produit"; 
$req = $pdo->prepare($requete); 
$req->execute(); 
$rows = $req-> fetchAll(PDO::FETCH_ASSOC); 


include 'components/Head.html'; 
?>

<title>Titre de la page</title>

<?php
include 'components/Header.html';
foreach($rows as $r){
  card($r['id'],$r['image'],$r['name'],$r['description'],$r['prix'],$r['date_de_creation'] ); 
}
 
/**req de supp d un produit dans la bdd */





include 'components/Footer.html';
?>

