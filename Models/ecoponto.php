<?php 

class Ecoponto{
    public $id;
    public $name;
    public $phone;
    public $adress;
    public $numero;
    public $photo;
    public $localizacao;

    function __construct($id, $name, $phone, $adress,$numero,$photo,$localizacao ) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->adress = $adress;
        $this->numero = $numero;
        $this->photo = $photo;
        $this->localizacao = $localizacao;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO ecoponto (name, phone, adress, numero, photo, localizacao)
            VALUES (:name, :phone, :adress, :numero, :photo, :localizacao);");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':phone' , $this->phone);
            $stmt->bindParam(':adress' , $this->adress);
            $stmt->bindParam(':numero' , $this->numero);
            $stmt->bindParam(':photo' , $this->photo);
            $stmt->bindParam(':localizacao' , $this->localizacao);
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
            $stmt = $db->conn->prepare("UPDATE ecoponto SET  name = :name, phone = :phone, adress = :adress, numero = :numero, photo = :photo, localizacao = :localizacao WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':adress', $this->adress);
            $stmt->bindParam(':numero', $this->numero);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':localizacao', $this->localizacao);
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