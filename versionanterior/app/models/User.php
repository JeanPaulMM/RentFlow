<?php
// models/User.php
require_once __DIR__.'/../../conexion/conexion.php';

class User {

    public function authenticate($email, $password) {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE email = :email AND contrasena = :contrasena");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contrasena', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    // User.php
    public function register($name, $lastname, $tel, $email, $password, $tipo){
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO usuarios (nombre, apellido, telefono, email, contrasena, tipo) 
            VALUES (:nombre, :apellido, :telefono, :email, :contrasena, :tipo)"
        );
        
        $stmt->bindParam(':nombre', $name, PDO::PARAM_STR);
        $stmt->bindParam(':apellido', $lastname, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $tel, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contraseña', $password, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->execute();
    }


    public function obtenerTipoUsuario($userId) {
        $query = "SELECT tipo_usuario FROM usuarios WHERE id = :id";
        $stmt = Conexion::conectar()->prepare($query);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array con el tipo de usuario
    }

}


