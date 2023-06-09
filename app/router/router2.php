<!-- ----- debut router -->
<?php
require ('../controller/ControllerDoctolib.php');
require ('../controller/ControllerPraticien.php');
require ('../controller/ControllerConnexion.php');
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerPatient.php');

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
 case "connexionInscrit" :
 case "connexionDeconnexion" :
  ControllerConnexion::$action();
  break;
 case "praticienListeDispo" :
 case "praticienDispoInsert" :
 case "praticienDispoInserted" :
 case "praticienListeRDV" :
 case "praticienListePatients" :
  ControllerPraticien::$action();
  break;
 case "fonctionnaliteOriginale" :
  ControllerDoctolib::$action();
  break; 
 case "adminListeSpecialites" :
 case "adminSpecialiteReadId" :
 case "adminSpecialiteReadOne" :
 case "adminSpecialiteInsert" :
 case "adminSpecialiteInserted" :
 case "adminListePraticiens" :
 case "adminNbrPraticiensPatient" :
 case "adminInfo" : 
   ControllerAdministrateur::$action();
   break;
 case "patientMonCompte" :
 case "patientListeRdv" :
 case "patientReadPraticiens" :
 case "patientReadDispo" :
 case "patientRdvInserted" :
     ControllerPatient::$action();
     break;
 default:
  $action = "doctolibAccueil";
  ControllerDoctolib::$action();
}
?>
<!-- ----- fin router -->