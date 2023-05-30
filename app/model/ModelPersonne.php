<!-- ----- debut modelPersonne -->
<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $nom, $prenom, $adresse, $login, $password, $statut,$specialite_id;
 
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

}
?>
<!-- ----- fin modelPersonne -->