<?php
require_once __DIR__ .'/../models/inmueblesModel.php';



class PropiedadesController
{
    public static function mostrarPropiedades()
    {
        return InmueblesModel::obtenerInmuebles();
    }
}
?>
