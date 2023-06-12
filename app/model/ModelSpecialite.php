<!-- ----- debut modelSpecialite -->
<?php
require_once 'Model.php';

class ModelSpecialite {
    private $id, $label;
 
    public function __construct($id = NULL,$label= NULL){
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
        } 
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setLabel($label) {
        $this->label = $label;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getLabel() {
        return $this->label;
    }
   
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $col = ["id", "label"];
            return [$col, $results];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
 
    public static function getAllId() { 
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, "ModelSpecialite");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $col = ["id", "label"];
            return [$col, $results];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
 
    public static function getSpecialiteToId($specialite_id) {
        try {
         $database = Model::getInstance();
         
         $query = "select label from specialite where id = :specialite_id;";
         $statement = $database->prepare($query);
         $statement->execute([
           'specialite_id' => $specialite_id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
     }
    
    public static function ifExisteSpecialite($label) {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'label' => $label,
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
    
    public static function InsertSpecialite($label) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from specialite";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into specialite value (:id, :label)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }
}
?>
<!-- ----- fin modelSpecialite -->