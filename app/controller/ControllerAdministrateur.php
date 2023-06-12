<!-- ----- debut ControllerAdministrateur -->
<?php

require_once '../model/ModelPersonne.php';

class ControllerAdministrateur {
    
    public static function adminListeSpecialites() {
        session_start();
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewSpecialites.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminListeSpecialites : vue = $vue");
        }
        require ($vue);
    }
   
    public static function adminSpecialiteReadId() {
        // Permet d'obtenir la liste des spécialités
        session_start();
        $results = ModelSpecialite::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        require ($vue);
    }
   
    public static function adminSpecialiteReadOne() {
        // Permet d'afficher une spécialité grace à son id
        session_start();
        $id = $_GET['id'];
        $results = ModelSpecialite::getOne($id);
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewSpecialites.php';
        require ($vue);
    }
   
    public static function adminSpecialiteInsert() {
        // Permet d'afficher la vue pour inserer une spécialité
        session_start();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewSpecialiteInsert.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminSpecialiteInsert : vue = $vue");
        }
        require ($vue);
    }
   
    public static function adminSpecialiteInserted() {
        // Gère l'affichage apres l'ajout ainsi que l'ajout dans la bd
        session_start();
        $label = $_GET['label'];
        //verifi si la spécialité existe ou non
        $exist = ModelSpecialite::ifExisteSpecialite($label);
        if (!$exist){
            ModelSpecialite::InsertSpecialite($label);  
        }
        $results = ModelSpecialite::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewSpecialiteInserted.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminSpecialiteInserted : vue = $vue");
        }
        require ($vue);
    }

    public static function adminListePraticiens() {
        //Permet d'afficher la liste des praticiens 
        session_start();
        $results = ModelPersonne::getAllPraticiensSpecialites();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllPraticiens.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminListePraticiens : vue = $vue");
        }
        require ($vue);
    }
    
    public static function adminNbrPraticiensPatient() {
        //Permet d'afficher le nombre de praticien par patient
        session_start();
        $results = ModelPersonne::getNbrPraticiensPatient();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewNbrPraticiensPatient.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminNbrPraticiensPatient : vue = $vue");
        }
        require ($vue);
    }
    
    public static function adminInfo() {
        //Permet d'afficher l'e nombre de praticien par patient l'ensemble des informations voulu 
        session_start();
        $results1 = ModelSpecialite::getAll();
        $results2 = ModelPersonne::getPraticiens();
        $results3 = ModelPersonne::getPatients();
        $results4 = ModelPersonne::getAdministrateurs();
        $results5 = ModelRendezvous::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewInfo.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminInfo : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerAdministrateur -->