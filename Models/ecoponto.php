<?php 

class Ecoponto{
    public $id;
    public $name;
    public $author;

    function __construct($id, $name, $author,) {
        $this->id = $id;
        $this->name = $name;
        $this->author = $author;
    }
    function create(){
        echo "Cadastrar no banco  "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Valor : ".$this->author."<br>";
    }
    function delete(){
        echo "Delete no banco   "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Valor : ".$this->author."<br>";
    }
    function update(){
        echo "Atualizado no banco   "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Valor : ".$this->author."<br>";
    }
}
?>