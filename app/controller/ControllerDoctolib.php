<!-- ----- debut controllerDoctolib -->
<?php

require_once '../model/ModelPersonne.php';
class ControllerDoctolib {
 // --- page d'acceuil
 public static function doctolibAccueil() {
  session_start();
  
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
 public static function fonctionnaliteOriginale() {
  session_start();
  $results = ModelPersonne::getAllRDVGroupByPraticien();
  include 'config.php';
  $vue = $root . '/app/view/innovations/viewRDVGroupByPraticien.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin controllerDoctolib -->

