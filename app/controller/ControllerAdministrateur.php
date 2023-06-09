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
        session_start();
        $results = ModelSpecialite::getAllId();
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewId.php';
        require ($vue);
    }
   
    public static function adminSpecialiteReadOne() {
        session_start();
        $id = $_GET['id'];
        $results = ModelSpecialite::getOne($id);
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewSpecialites.php';
        require ($vue);
    }
   
    public static function adminSpecialiteInsert() {
        session_start();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewSpecialiteInsert.php';
        if (DEBUG) {
            echo ("ControllerAdministrateur : adminSpecialiteInsert : vue = $vue");
        }
        require ($vue);
    }
   
    public static function adminSpecialiteInserted() {
        session_start();
        $label = $_GET['label'];       
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