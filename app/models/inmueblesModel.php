<?php
require_once __DIR__ . '/../../conexion/conexion.php';

class InmueblesModel
{
    public static function obtenerInmuebles()
    {
        $stmt = Conexion::conectar()->prepare("
            SELECT 
                propiedades.titulo,
                propiedades.precio,
                propiedades.ubicacion,
                fotos.url_foto AS foto
            FROM 
                propiedades
            LEFT JOIN 
                fotos ON propiedades.id = fotos.propiedad_id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>