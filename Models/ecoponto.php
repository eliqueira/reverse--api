<?php 

class Ecoponto{
    public $id;
    public $name;
    public $number;
    public $adress;

    function __construct($id, $name, $number, $adress) {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
        $this->adress = $adress;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO ecoponto (name, number, adress)
            VALUES (:name, :number, :adress);");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':number' , $this->number);
            $stmt->bindParam(':adress' , $this->adress);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            
            return $id;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result,500);
        }
    }
    function delete(){
        $db = new Database(); 
            try{
                $stmt = $db->conn->prepare("DELETE FROM ecoponto WHERE id = :id;");
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
            $result['message'] = "Error Select All Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result);
            }
    }
    function update(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("UPDATE ecoponto SET  name = :name, number = :number, adress = :adress WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':number', $this->number);
            $stmt->bindParam(':adress', $this->adress);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        } 
    }
    function selectAll(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM ecoponto");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
    function selectByid(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM ecoponto WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
}
?>