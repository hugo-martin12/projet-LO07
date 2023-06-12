<!-- ----- debut controllerDoctolib -->
<?php

require_once '../model/ModelPersonne.php';
class ControllerDoctolib {
 // --- page d'acceuil
 public static function doctolibAccueil() {
     //permet d'afficher la page d'acceuil
  session_start();
  
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function fonctionnaliteOriginale() {
   //permet de gerer la fonctionnalite Originale
  session_start();
  $results = ModelPersonne::getAllRDVGroupByPraticien();
  include 'config.php';
  $vue = $root . '/app/view/innovations/viewRDVGroupByPraticien.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
  public static function ameliorationMVC() {
     //permet d'afficher la page d'acceuil
  session_start();
  
  include 'config.php';
  $vue = $root . '/app/view/innovations/viewAmeliorationMVC.php';
  if (DEBUG)
   echo ("ControllerDoctolib : ameliorationMVC : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin controllerDoctolib -->

