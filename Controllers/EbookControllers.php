<?php
class EbookControllers{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $descricao = $_POST['descricao'];
        $author = $_POST['author'];
        $photo = $_POST['photo'];
        $texto = $_POST['texto'];


        $ebook = new Ebook(NULL, $name, $descricao, $author,$photo,$texto);
        $id = $ebook->create();

        $result['message'] = "Criado com sucesso";
        $result['ebook']['id'] = $id;
        $result['ebook']['name'] = $name;
        $result['ebook']['descricao'] = $descricao;
        $result['ebook']['author'] = $author;
        $result['ebook']['photo'] = $photo;
        $result['ebook']['texto'] = $texto;

        $response->out($result);

    }

    function delete() {
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];

        $ebook = new Ebook($id, null,null,null,null,null);
        $ebook->delete();

        $result['message'] = "Deletado com sucesso";
        $result['ebook']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $descricao = $_POST['descricao'];
        $author = $_POST['author'];
        $photo = $_POST['photo'];
        $texto = $_POST['texto'];


        $ebook = new Ebook($id,$name,$descricao,$author,$photo,$texto);
        $ebook->update();

        $result['message'] = "Atualizado com sucesso";
        $result['ebook']['id'] = $id;
        $result['ebook']['name'] = $name;
        $result['ebook']['descricao'] = $descricao;
        $result['ebook']['author'] = $author;
        $result['ebook']['photo'] = $photo;
        $result['ebook']['texto'] = $texto;

        $response->out($result);
    }
    
    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $ebook = new Ebook(null,null,null,null,null,null);
        $result = $ebook->selectAll();
        $response->out($result);
    }

    function selectByid(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $ebook = new Ebook($id,null,null,null,null,null);
        $result = $ebook->selectByid();
        $response->out($result);
    }
}
?>