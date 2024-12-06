<?php
// controllers/LoginController.php
require_once __DIR__.'/../models/User.php';

class UserController {
    
    public function login() {
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['tipo'] = $user['tipo'];
                header('Location: ../../site/index.php');
                exit;
            } else {
                ?><html><script>alert('login failed');</script></html><?php
            }
        }
    }

    public function sign(){
        if(isset($_POST['signup'])){
            $name = $_POST['nombre'];
            $lastname = $_POST['apellido'];
            $tel = $_POST['telefono'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tipo=$_POST['tipo'];
            
            $userModel = new User();
            $Register = $userModel->register($name,$lastname,$tel,$email,$password,$tipo);

            if ($Register){
                header('Location:../../site/login/login.php');
                exit;
            } else {
                ?><html><script>alert('El registro fallo');</script></html><?php
            }
        }
    }

    /*public static function obtenerTipoUsuarioLogueado() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userModel = new User();
            $user = $userModel->obtenerTipoUsuario($userId);
            return $user;
        }
        return null;
    }*/
    
}