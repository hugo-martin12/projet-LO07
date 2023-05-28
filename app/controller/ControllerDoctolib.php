<!-- ----- debut controllerDoctolib -->
<?php
class ControllerDoctolib {
 // --- page d'acceuil
 public static function doctolibAccueil() {
  session_start();
  echo $_SESSION['login'];
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
  public static function initialisation() {
  $_SESSION['login']='vide';
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin controllerDoctolib -->

