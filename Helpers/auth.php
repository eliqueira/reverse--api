<?php
class Auth{
    function allowedRole($role){
        $response = new Output();
        //Verifia se possui ACCESS_TOKEN
        if(!isset($_SERVER['HTTP_ACCESS_TOKEN'])){
            $result['message'] = "ACCESS_TOKEN não informado!";
            $response->out($result, 403);
        }
        $token = $_SERVER['HTTP_ACCESS_TOKEN'];

        $session = new Session(null, $token, null);
        $admin_session = $session->checkSessionRoles();
        
        //Verifica se possui sessão 
        if(!$admin_session){
            $result['message'] = "Sessão não autorizada!";
            $response->out($result, 403);
        }

        //Verifica se possui papel de admin
        if(strpos($admin_session['roles'], $role) === false){
            $result['message'] = "Sessão não possui permissão de $role!";
            $response->out($result, 403);
        }

        return $admin_session;
    }
}
?>