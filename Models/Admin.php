<?php 
class Admin{
    public $id;
    public $name;
    public $email;
    public $pass;
    function __construct($id, $name, $email, $pass) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }
    function create(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("INSERT INTO administrador (name, email, pass, roles)
            VALUES (:name, :email, :pass, 'admin');");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            return $id;
        }catch(PDOException $e) {
            $result['message'] = "Error Select All Admin: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM administrador WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e) {
            $result['message'] = "Error Delete Admin: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function update(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("UPDATE administrador SET name = :name, email = :email, pass = :pass WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Update Admin: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function selectAll(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT id, name, email FROM administrador;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select All Admin: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function selectById(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT id, name, email FROM administrador WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select Admin By Id: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function login(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT id, name, email, roles FROM administrador WHERE email = :email AND pass = :pass; ");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Admin Login:" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}
?>