<?php
require_once __DIR__ . '/../../conexion/conexion.php';

class consultasModel{

    public static function traerCiudades()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT id_ciudad, ciudad_nombre, estado_provincia, pais
            FROM ciudades
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function traerPropiedades()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT * FROM propiedades p
        INNER JOIN fotos f ON f.propiedad_id = p.id_propiedad
        INNER JOIN ciudades c ON c.id_ciudad = p.ciudad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCiudadesConFotos()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT ciudades.ciudad_nombre, fotos_ciudades.foto_id
            FROM ciudades
            JOIN fotos_ciudades ON ciudades.id_ciudad = fotos_ciudades.ciudad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCiudadesRndm()
    {
        $stmt = Conexion::conectar()->prepare("
        SELECT ciudades.ciudad_nombre, fotos_ciudades.foto_id
        FROM ciudades
        JOIN fotos_ciudades ON ciudades.id_ciudad = fotos_ciudades.ciudad_id ORDER BY RAND() LIMIT 4
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function TraerInfoPropiedad($id)
    {
        $stmt =Conexion::conectar()->prepare("
        SELECT * FROM propiedades p
        INNER JOIN fotos f ON f.propiedad_id = p.id_propiedad
        WHERE p.id_propiedad = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}