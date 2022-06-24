<?php 
class Ebook{
    public $id;
    public $name;
    public $descricao;
    public $author;
    public $photo;
    public $texto;

    function __construct($id, $name,$descricao, $author, $photo,$texto) {
        $this->id = $id;
        $this->name = $name;
        $this->descricao = $descricao;
        $this->author = $author;
        $this->photo = $photo;
        $this->texto = $texto;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO ebook (name,descricao, author, photo, texto)
            VALUES (:name,:descricao, :author, :photo, :texto);");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':descricao' , $this->descricao);
            $stmt->bindParam(':author' , $this->author);
            $stmt->bindParam(':photo' , $this->photo);
            $stmt->bindParam(':texto' , $this->texto);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            
            return $id;
        }
        catch(PDOException $e){
            $result['message'] = "Error Create Ebook: " . $e->getMessage();
            $response = new Output();
            $response->out($result,500);
        }
    }
    function delete(){
        $db = new Database(); 
            try{
                $stmt = $db->conn->prepare("DELETE FROM ebook WHERE id = :id;");
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
            $result['message'] = "Error Delete Ebook: " . $e->getMessage();
            $response = new Output();
            $response->out($result,500);
            }
    }
    function update(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("UPDATE ebook SET  name = :name, descricao = :descricao, author = :author, photo = :photo, texto = :texto WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':author', $this->author);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':texto', $this->texto);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            $result['message'] = "Error Update Ebook: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        } 
    }
    function selectAll(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM ebook");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select All Ebook: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
    function selectByid(){
        $db = new Database(); 
        try{
            $stmt = $db->conn->prepare("SELECT * FROM ebook WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $result['message'] = "Error Select By Id Ebook: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }   
    }
}
?>