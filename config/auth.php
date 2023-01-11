<?php
require 'config/init.php';

if(!isset($_SESSION['pseudo'])){
  header("Location: connexion.php"); 
}
?>