<!-- ----- debut modelRendezvous -->
<?php
require_once 'Model.php';

class ModelRendezvous {
 private $id, $patient_id, $praticien_id, $rdv_date;
 
 public function __construct($id = NULL,$patient_id= NULL, $praticien_id= NULL, $rdv_date= NULL){
    if (!is_null($id)) {
   $this->id = $id;
   $this->patient_id = $patient_id;
   $this->praticien_id = $praticien_id;
   $this->rdv_date = $rdv_date;
  } 
 }
   function setId($id) {
    $this->id = $id;
    }
    function setPatient_id($patient_id) {
    $this->patient_id = $patient_id;
    }
    function setPraticien_id($praticien_id) {
    $this->praticien_id = $praticien_id;
    }
    function setRdv_date($rdv_date) {
    $this->rdv_date = $rdv_date;
    }
    function getId() {
    return $this->id;
    }
    function getPatient_id() {
    return $this->patient_id;
    }
    function getPraticien_id() {
    return $this->praticien_id;
    }
    function getRdv_date() {
    return $this->rdv_date;
    }

    public static function getAll() {
        try {
         $database = Model::getInstance();
         $query = "SELECT rendezvous.id, rendezvous.rdv_date, p1.nom as nom1, p1.prenom as prenom1, p2.nom as nom2, p2.prenom as prenom2 FROM rendezvous, personne AS p1, personne AS p2 WHERE rendezvous.patient_id = p1.id AND rendezvous.praticien_id=p2.id AND rendezvous.patient_id<>0";

         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "date et heure", "nom du patient", "prénom du patient", "nom du praticien", "prénom du praticien"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
    
    public static function getListDispoToId($id_praticien) {
        try {
         $database = Model::getInstance();
         $query = "select rdv_date from rendezvous where patient_id = 0 and praticien_id = :id_praticien;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id_praticien' => $id_praticien
         ]);
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["Rendez-vous et horaire disponible"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
     
     public static function getListRDVToId($id_praticien) {
        try {
         $database = Model::getInstance();
         $query = "select rdv_date, nom, prenom from rendezvous, personne where patient_id = personne.id and praticien_id = :id_praticien and patient_id<>0 order by rdv_date;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id_praticien' => $id_praticien
         ]);
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["RDV", "Nom", "Prénom"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
     
      public static function getListPatientToId($id_praticien) {
        try {
         $database = Model::getInstance();
         $query = "select distinct nom, prenom, adresse from rendezvous, personne where patient_id = personne.id and praticien_id = :id_praticien and patient_id<>0 order by rdv_date;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id_praticien' => $id_praticien
         ]);
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["Nom", "Prénom", "Adresse"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
     
     public static function ifExisteRDV($id_praticien,$rdv_date) {
        try {
         $database = Model::getInstance();
         $query = "select * from rendezvous where praticien_id = :id_praticien and rdv_date = :rdv_date;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id_praticien' => $id_praticien,
            'rdv_date' => $rdv_date
         ]);
         $results = $statement->fetchAll();
         if (empty($results)){
            return FALSE;
           }
         else{
            return TRUE;
           } 
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
     
      public static function InsertRdv($id_praticien,$rdv_date) {
        try {
         $database = Model::getInstance();

         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from rendezvous";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;
         $patient = 0;
         
         echo $rdv_date . "   |  ";
         // ajout d'un nouveau tuple;
         $query = "insert into rendezvous value (:id, :patient_id, :praticien_id, :rdv_date)";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id,
           'patient_id' => $patient,
           'praticien_id' => $id_praticien,
           'rdv_date'=>$rdv_date
         ]);
         return $rdv_date;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function addRdv($id_rdv, $id_patient) {
           try {
            $database = Model::getInstance();
            $query = "UPDATE rendezvous SET patient_id = :id_patient WHERE id = :id_rdv;";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_rdv' => $id_rdv,
                'id_patient' => $id_patient,
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
       }
     
}

?>
<!-- ----- fin modelRendezvous -->