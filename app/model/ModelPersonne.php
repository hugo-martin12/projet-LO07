<!-- ----- debut modelPersonne -->
<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $nom, $prenom, $adresse, $login, $password, $statut,$specialite_id;
 
 const ADMINISTRATEUR = 0;
 const PRACTICIEN = 1;
 const PATIENT = 2;
 
 public function __construct($id = NULL,$nom= NULL, $prenom= NULL, $adresse= NULL, $login= NULL, $password= NULL, $statut= NULL,$specialite_id= NULL){
    if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
   $this->login = $login;
   $this->password = $password;
   $this->statut = $statut;
   $this->specialite_id = $specialite_id;
  } 
 }
   function setId($id) {
    $this->id = $id;
    }
    function setNom($nom) {
    $this->nom = $nom;
    }
    function setPrenom($prenom) {
    $this->prenom = $prenom;
    }
    function setAdresse($adresse) {
    $this->adresse = $adresse;
    }
    function setLogin($login) {
    $this->login = $login;
    }
    function setPassword($password) {
    $this->password = $password;
    }
    function setStatut($statut) {
    $this->statut = $statut;
    }
    function setSpecialite_id($specialite_id) {
    $this->specialite_id = $specialite_id;
    }
    function getId() {
    return $this->id;
    }
    function getNom() {
    return $this->nom;
    }
    function getPrenom() {
    return $this->prenom;
    }
    function getAdresse() {
    return $this->adresse;
    }
    function getLogin() {
    return $this->login;
    }
    function getPassword() {
    return $this->password;
    }
    function getStatut() {
    return $this->statut;
    }
    function getSpecialite_id() {
    return $this->specialite_id;
    }
    
    public static function getPersonneToId($id) {
    try {
     $database = Model::getInstance();
     $query = "select id,nom,prenom,statut from personne where id = :id;";
     $statement = $database->prepare($query);
     $statement->execute([
        'id' => $id
     ]);
     $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
     return $results;
    } catch (PDOException $e) {
     printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
     return NULL;
    }
 }

 
 public static function ifExisteLogin($login,$password) {
    try {
     $database = Model::getInstance();
     $query = "select id from personne where login = :login and password = :password;";
     $statement = $database->prepare($query);
     $statement->execute([
        'login' => $login,
        'password' => $password
     ]);
     $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
     if (empty($results)){
        return FALSE;
     }
     else{
        return $results;  
     }
    } catch (PDOException $e) {
     printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
     return NULL;
    }
 }
 
 public static function InsertPersonne($nom, $prenom, $adresse, $login, $password, $statut,$specialite_id) {
        try {
         $database = Model::getInstance();

         // recherche de la valeur de la clé = max(id) + 1
         $query = "select max(id) from personne";
         $statement = $database->query($query);
         $tuple = $statement->fetch();
         $id = $tuple['0'];
         $id++;
         // ajout d'un nouveau tuple;
         $query = "insert into personne value (:id,:nom, :prenom, :adresse, :login, :password, :statut,:specialite_id)";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id,
           'nom' => $nom,
           'prenom' => $prenom,
           'adresse'=>$adresse,
           'login' => $login,
           'password' => $password,
           'statut' => $statut,
           'specialite_id' => $specialite_id
         ]);
         return $id;
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }

       
       public static function getAllRDVGroupByPraticien() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p1.nom, p1.prenom, s.label, p2.nom, p2.prenom, r.rdv_date FROM personne as p1, specialite as s, personne as p2, rendezvous as r WHERE p1.id <> p2.id and p1.specialite_id = s.id and p1.id = r.praticien_id and p2.id = r.patient_id and p2.id <>0 GROUP BY p1.nom, p1.prenom, p2.nom, p2.prenom, r.rdv_date";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll();
         return $results;
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getAllPraticiensSpecialites() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p.id, p.nom, p.prenom, p.adresse, s.label FROM personne as p, specialite as s WHERE p.specialite_id = s.id AND p.statut=1 ORDER BY p.id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse", "spécialité"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getNbrPraticiensPatient() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p.id, p.nom, p.prenom, p.adresse, COUNT(rdv.praticien_id) FROM personne as p, rendezvous as rdv WHERE p.id=rdv.patient_id AND rdv.patient_id<>0 AND p.statut=2 GROUP BY rdv.patient_id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse", "nombre de praticiens"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getPraticiens() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p.id, p.nom, p.prenom, p.adresse FROM personne as p WHERE p.statut=1 ORDER BY p.id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getPatients() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p.id, p.nom, p.prenom, p.adresse FROM personne as p WHERE p.statut=2 ORDER BY p.id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getAdministrateurs() {
        try {
         $database = Model::getInstance();
         $query = "SELECT p.id, p.nom, p.prenom, p.adresse FROM personne as p WHERE p.statut=0 ORDER BY p.id";
         $statement = $database->prepare($query);
         $statement->execute();
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse"];
         return [$col, $results];
        } 
        catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return -1;
        }
       }
       
       public static function getPatientToId($id) {
        try {
         $database = Model::getInstance();
         $query = "select id, nom, prenom, adresse, login, password, statut, specialite_id from personne where id = :id;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id' => $id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["id", "nom", "prénom", "adresse", "login", "password", "statut", "specialite_id"];
         return [$col, $results];
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
       }
       
       public static function getRdvToId($id) {
        try {
         $database = Model::getInstance();
         $query = "SELECT personne.nom, personne.prenom, rendezvous.rdv_date FROM personne, rendezvous WHERE personne.id=rendezvous.praticien_id AND rendezvous.patient_id = :id ORDER BY rendezvous.rdv_date;";
         $statement = $database->prepare($query);
         $statement->execute([
            'id' => $id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_ASSOC);
         $col = ["Nom", "Prénom", "Date et heure du RDV"];
         return [$col, $results];
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
       }
       
       public static function getNomsPraticiens() { 
        try {
            $database = Model::getInstance();
            $query = "select id, nom, prenom from personne where statut = :statut";
            $statement = $database->prepare($query);
            $statement->execute([
            'statut' => self::PRACTICIEN
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
       }
       
       
       public static function getDispoPraticiensToId($id) {
           try {
            $database = Model::getInstance();
            $query = "SELECT id, rdv_date FROM rendezvous WHERE patient_id=0 AND praticien_id = :id;";
            $statement = $database->prepare($query);
            $statement->execute([
            'id' => $id
            ]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
       }
}
?>
<!-- ----- fin modelPersonne -->