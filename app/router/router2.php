<!-- ----- debut router -->
<?php
require ('../controller/ControllerDoctolib.php');

require ('../controller/ControllerConnexion.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];
// fonction parse_str permet de construire + une table de hachage (clé + valeur)
parse_str($query_string, $param);
//$action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);
$action = $param['action'];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
 // Tache par défaut
 case "connexionLogin" :
 case "connexionLogined" :
 case "connexionInscription" :
 case "connexionDeconnexion" :
  ControllerConnexion::$action();
  break;
 case "initialisation" :
  ControllerDoctolib::$action();
  break; 

 default:
  $action = "doctolibAccueil";
  ControllerDoctolib::$action();
}
?>
<!-- ----- fin router -->