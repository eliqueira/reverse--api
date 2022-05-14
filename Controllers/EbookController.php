<?php
class EbookController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        $name = $_POST['name'];
        $author = $_POST['author'];

        $user = new Ebook(null, $name,$author);
        $id = $user->create();

        $result['message'] = "Criado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['author'] = $author;
        $response->out($result);

    }

    function delete() {
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];

        $user = new Ebook($id, null,null,null);
        $user->delete();

        $result['message'] = "Deletado com sucesso";
        $result['user']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];

        $user = new Ebook($id,$name,$author);
        $user->update();

        $result['message'] = "Atualizado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['author'] = $author;
        $response->out($result);
    }
    
    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $user = new Ebook(null,null,null,null);
        $result = $user->selectAll();
        $response->out($result);
    }

    function selectByid(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $user = new Ebook($id,null,null,null);
        $result = $user->selectByid();
        $response->out($result);
    }
}
?>