<?php
require_once __DIR__ . '/../model/principalModel.php';


class CiudadController
{
    public static function mostrarCiudades()
    {
        return CiudadModel::obtenerCiudadesConFotos();
    }
}
?>
