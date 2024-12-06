<?php
require_once __DIR__ . '/../../conexion/conexion.php';

class consultasModel{

    public static function traerCiudades()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT id, ciudad_nombre, estado_provincia, pais
            FROM ciudades
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function traerPropiedades()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT * FROM propiedades p
        INNER JOIN fotos f ON f.propiedad_id = p.id
        INNER JOIN ciudades c ON c.id = p.ciudad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCiudadesConFotos()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT ciudades.ciudad_nombre, fotos_ciudades.foto_id
            FROM ciudades
            JOIN fotos_ciudades ON ciudades.id = fotos_ciudades.ciudad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCiudadesRndm()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT ciudades.ciudad_nombre, fotos_ciudades.foto_id
        FROM ciudades
        JOIN fotos_ciudades ON ciudades.id = fotos_ciudades.ciudad_id ORDER BY RAND() LIMIT 4
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}