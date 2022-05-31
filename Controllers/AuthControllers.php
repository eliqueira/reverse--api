<?php
class AuthController{

    function login(){
        $response = new Output();
        $response->allowedMethod('POST');

        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $description = $_SERVER['HTTP_ADMIN_AGENT'];

        $admin = new Admin(null, null, $email, sha1($pass));
        $adminLogged = $admin->login();
        
        if($adminLogged){
            $token = md5(uniqid($adminLogged['id'], true));
            $session = new Session($adminLogged['id'], $token, $description);
            if($session->create()){
                $result['session']['token'] = $token;
                $result['session']['email'] = $adminLogged['email'];
                $result['session']['roles'] = $adminLogged['roles'];
                $response->out($result);
            }
        }else{
            $result['message'] = "Usuário ou Senha Inválidos!";
            $response->out($result, 403);
        }
    }

    function logout(){
        $response = new Output();
        $response->allowedMethod('POST');

        $token = $_POST['token'];

        $session = new Session(null, $token, null);
        
        if($session->delete()){
            $result['message'] = "Sessão encerrada! Volte sempre!";
            $response->out($result);
        }else{
            $result['message'] = "Sessão não encontrada!";
            $response->out($result, 403);
        }
    }
}
?>