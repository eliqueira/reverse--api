<?php 

class Ecoponto{
    public $id;
    public $name;
    public $number;
    public $adress;
    public $numero;
    public $photo;

    function __construct($id, $name, $number, $adress,$numero,$photo ) {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
        $this->adress = $adress;
        $this->numero = $numero;
        $this->photo = $photo;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO ecoponto (name, number, adress, numero, photo)
            VALUES (:name, :number, :adress, :numero, :photo);");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':number' , $this->number);
            $stmt->bindParam(':adress' , $this->adress);
            $stmt->bindParam(':numero' , $this->numero);
            $stmt->bindParam(':photo' , $this->photo);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            
            return $id;
        }
        catch(PDOException $e){
            $result['message'] = "Error Create Ecopoint: " . $e->getMessage();
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
            $result['message'] = "Error Delete Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result);
            }
    }
    function update(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("UPDATE ecoponto SET  name = :name, number = :number, adress = :adress, numero = :numero, photo = :photo WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':number', $this->number);
            $stmt->bindParam(':adress', $this->adress);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            $result['message'] = "Error Update Ecopoint: " . $e->getMessage();
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
            $result['message'] = "Error Select By Id Ecopoint: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
}
?>