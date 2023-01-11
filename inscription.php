<?php
require 'config/init.php';
?>



<?php
if (isset($_POST['submitFormulaire'])) {
  echo 'formulaire envoyé';
  if (!(empty($_POST['name']) ||empty($_POST['email']) || empty($_POST['password']))) {
    echo 'on traite le formulaire';
    $name = $_POST['name']; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    // password n'est pas un nombre donc il n'a pas de valeur en nombre entier
    if ((strlen($password) >= 8 && strlen($password) <= 12)) {
      echo "inscription acceptée";
      // la requete vers la bdd
      $requete = "SELECT * FROM client WHERE email = '$email'";
      $req = $pdo->prepare($requete);
      $req->execute();
      //$result= $req->fetchAll(PDO::FETCH_ASSOC);
      $count = $req->rowCount();
      // rowCount
      if ($count === 0) { // if rowCount égal 0
        echo "inscription autorisé";
        $requete = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        $req = $pdo->prepare($requete);
        $req->execute();
      } else {
        echo "refus d'inscription";
      }
    } else {
      echo "inscription refusé";
    }

  }
}
?>

<?php
include 'components/Head.html';
include 'components/Header.html';
/**
* creation form
*/
?>
<form action="inscription.php" method="POST" class="border border-primary border-4 m-2 w-50">
  <fieldset>
    <legend>Formulaire d'inscription</legend>
    <div class="form-group w-25 p-3">
      <div class="form-group pb-2">
        <label for="name"> Name: </label>
        <input type="text" name="name">
      </div>
      <div class="form-group pb-2">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
      </div>
      <div class="form-group pb-2">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
      </div>
      <div class="form-group pb-2">
        <input type="submit" name="submitFormulaire" value="Envoyer">
        </div>
      </div>
    </div>
  </fieldset>
</form>



<?php
include 'components/Footer.html';
?>