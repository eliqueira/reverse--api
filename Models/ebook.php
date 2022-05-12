<?php 

class Ebook{
    public $id;
    public $name;
    public $number;
    public $adress;

    function __construct($id, $name, $author, $adress) {
        $this->id = $id;
        $this->name = $name;
        $this->number = $number;
        $this->adress = $adress;
    }
    function create(){
        echo "Cadastrar no banco  "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Number : ".$this->number."<br>"
        ."Adress : ".$this->adress."<br>";
    }
    function delete(){
        echo "Delete no banco   "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Number : ".$this->number."<br>"
        ."Adress : ".$this->adress."<br>";
    }
    function update(){
        echo "Atualizado no banco   "."<br>"."<br>"
        ."Id : ". $this->id. "<br>"
        ."Name : ".$this->name."<br>"
        ."Number : ".$this->number."<br>"
        ."Adress : ".$this->adress."<br>";
    }
}
?>