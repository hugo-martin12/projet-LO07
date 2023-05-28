<!-- ----- debut controllerConnexion -->
<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';

class ControllerConnexion {
 // --- page d'acceuil
 public static function connexionLogin() {
  session_start();
  echo $_SESSION['login'];
  include 'config.php';
  $vue = $root . 'app/view/connexion/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnexion : conexionLogin : vue = $vue");
  require ($vue);
 }
  public static function connexionLogined() {
   session_start();
   echo $_SESSION['login'];
   $login = $_GET['login'];
   $password = $_GET['password'];
   $existe = ModelPersonne::ifExisteLogin($login,$password);
   if($existe){
       $_SESSION['login'] = $login;
       
       $id = $existe[0]->getId();
       $_SESSION['currentUser'] = ModelPersonne::getPersonneToId($id);
       include 'config.php';
       $vue = $root . 'app/view/viewDoctolibAccueil.php';
   }
   else{
       include 'config.php';
       $vue = $root . 'app/view/connexion/viewFailLogin.php';
   }
  if (DEBUG)
   echo ("ControllerConnexion : connexionLogined : vue = $vue");
  require ($vue);
 }
 
  public static function connexionInscription() {
  session_start();
  $results = ModelSpecialite::getAll();
  include 'config.php';
  $vue = $root . 'app/view/connexion/viewInscription.php';
  if (DEBUG)
   echo ("ControllerConnexion : conexionInscription : vue = $vue"); 
  require ($vue);
 }
 
  public static function connexionDeconnexion() {
  session_start();
  
  $_SESSION['login'] = "vide";
  $_SESSION['currentUser'] = "vide";
  include 'config.php';
  $vue = $root . 'app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerConnexion : connexionDeconnexion : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin controllerConnexion -->

