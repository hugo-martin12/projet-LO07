<!-- ----- debut controllerConnexion -->
<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';

class ControllerConnexion {
 // --- page d'acceuil
 public static function connexionLogin() {
     //Permet d'afficher la view pour se connecter
  session_start();
  echo $_SESSION['login'];
  include 'config.php';
  $vue = $root . 'app/view/connexion/viewLogin.php';
  if (DEBUG)
   echo ("ControllerConnexion : conexionLogin : vue = $vue");
  require ($vue);
 }
  public static function connexionLogined() {
      //Gère l'affichage suite à la connexion + 
      
      
   session_start();
   $login = $_GET['login'];
   $password = $_GET['password'];
   //verifi si le couple login, password existe dans la bd 
   $existe = ModelPersonne::ifExisteLogin($login,$password);
   if($existe){
       //met à jour la variable $_SESSION['login'] avec le login de la personne connectée
       $_SESSION['login'] = $login;
       $id = $existe[0]->getId();
       //met à jour la variable $_SESSION['currentUser'] qui stocke plusieurs informations sur la personne connectée
       $_SESSION['currentUser'] = ModelPersonne::getPersonneToId($id);
       include 'config.php';
       $vue = $root . 'app/view/viewDoctolibAccueil.php';
   }
   //couple login, password  n'existe pas donc connexion impossible
   else{
       include 'config.php';
       $vue = $root . 'app/view/connexion/viewFailLogin.php';
   }
  if (DEBUG)
   echo ("ControllerConnexion : connexionLogined : vue = $vue");
  require ($vue);
 }
 
  public static function connexionInscription() {
      //Permet d'afficher la view pour s'inscrire
  session_start();
  $results = ModelSpecialite::getAll();
  include 'config.php';
  $vue = $root . 'app/view/connexion/viewInscription.php';
  if (DEBUG)
   echo ("ControllerConnexion : connexionInscription : vue = $vue"); 
  require ($vue);
 }
 
 public static function connexionInscrit() {
     //Gere l'affichage suite à l'inscription
  session_start();
  
  $nom = $_GET['nom'];
  $prenom = $_GET['prenom'];
  $adresse = $_GET['adresse']; 
  $login = $_GET['login']; 
  $password = $_GET['password']; 
  $statut = $_GET['statut'];
  $specialite_id = $_GET['specialite_id']; 
  //verifi si le couple login, password existe dans la BD
  $existe = ModelPersonne::ifExisteLogin($login,$password);
  $statut = intval($statut);
  $specialite_id = intval($specialite_id); 

   //si existe alors inscription impossible 
   if($existe){
       include 'config.php';
       $vue = $root . 'app/view/connexion/viewFailInscription.php';
   }
   //existe pas alors ajout dans la BD 
   else{
       $results = ModelPersonne::InsertPersonne($nom, $prenom, $adresse, $login, $password, $statut,$specialite_id);
       $specialite_id = ModelSpecialite::getSpecialiteToId($specialite_id);
       $specialite_id = $specialite_id[0]->getLabel();
       //on stocke ca dans $sta juste pour l'afficher dans la vue ICI on ne veut pas stocker le statut 
       if($statut==ModelPersonne::ADMINISTRATEUR){$sta = "administrateur";}
       if($statut==ModelPersonne::PRACTICIEN){$sta = "praticien";}
       if($statut==ModelPersonne::PATIENT){$sta = "patient";}
       
       include 'config.php';
       $vue = $root . 'app/view/connexion/viewInscrit.php';
   }
  if (DEBUG)
   echo ("ControllerConnexion : connexionInscrit : vue = $vue"); 
  require ($vue);
 }
 
  public static function connexionDeconnexion() {
      //Permet la deconnexion d'une personne
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

