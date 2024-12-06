<?php
require_once __DIR__ .'/../../conexion/conexion.php';

class CiudadModel
{
    public static function obtenerCiudadesConFotos()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT ciudades.nombre, fotos_ciudades.foto_id
            FROM ciudades
            JOIN fotos_ciudades ON ciudades.id = fotos_ciudades.ciudad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCiudadesRndm()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT ciudades.nombre, fotos_ciudades.foto_id
        FROM ciudades
        JOIN fotos_ciudades ON ciudades.id = fotos_ciudades.ciudad_id ORDER BY RAND() LIMIT 4
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
