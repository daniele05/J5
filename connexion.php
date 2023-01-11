<?php
require 'config/init.php';




// req form de connexion 
if (isset($_POST['form_Connexion'])) {
    // echo"Formulaire de connexion traité"; 
    if ( empty($_POST['pseudo'])  || empty($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        $requete = "SELECT pseudo, password FROM membre WHERE  pseudo = '$pseudo'";
        $req = $pdo-> prepare($requete); 
        
        $req->execute(); 
        $rows = $req->rowCount(); 
        
        if($rows==1){

            $_SESSION['pseudo']= $pseudo; 
            $_SESSION['']= 
            header("Location: _index.php"); 
        }else{
          $messageErreur = "nom utilisateur ou mot de passe incorrect"; 
        }
    }
} else {
    echo 'Veuillez vous reconnecter';
}var_dump($_SESSION); 


// maintenir la connexion si je suis connectee
// $_SESSION['form_Connexion']; 
// if ($_SESSION['form_Connexion'] == true) {
//     echo 'Vous êtes bien connecté(e)';
// } else {
//     // header("Location: connexion.php"); 
// }
?>
<?php
// setcookie(
//     'LOGGER_USER',
//     'user@exemple.com',
//     [
//         'expires' => time() + 365 * 24 * 3600,
//         'secure' => true,
//         'httponly' => true,
//     ]
// )

?>

<?php
include 'components/Head.html';
?>


<div class="row">
    <aside class="col-sm-4">
        <p> Formulaire de connexion</p>
        <div class="card">
            <article class="card-body"></article>
            <a href="float-right btn btn-outline-primary ">Sign Up</a>
            <h4 class="card-title">Sign In</h4>
            <form action="connexion.php" method="POST" class="border border-primary  m-4 p-2 w-50">
                <div class="form-group pb-2">
                    <label for="pseudo">Pseudo: </label>
                    <input type="text" name="pseudo">
                </div>
                <div class="form-group pb-2">
                    <a class="float-right" href="#">Forgot?</a>
                    <label for="password">Password: </label>
                    <input type="password" name="password">
                </div>
                <div class="form-group pb-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Save password
                        </label>
                    </div>
                </div>
                <div class="form-group pb-2">
                    <input type="submit" name="form_Connexion" value="Envoi">
                </div>
            </form>
    </aside>
</div>