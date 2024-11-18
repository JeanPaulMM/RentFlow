<?php
require_once __DIR__ .'/../models/principalModel.php';



class CiudadController
{
    public static function mostrarCiudades()
    {
        return CiudadModel::obtenerCiudadesConFotos();
    }
}
?>
