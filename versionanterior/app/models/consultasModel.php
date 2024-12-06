<?php
require_once __DIR__ . '/../../conexion/conexion.php';

class consultasModel{

    public static function traerCiudades()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT id, nombre, estado_provincia, pais
            FROM ciudades
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}