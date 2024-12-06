<?php
require_once __DIR__.'/../models/consultasModel.php';

class ConsultasController{

    public static function mostrarCiudades() {
        return ConsultasModel::traerCiudades();
    }
}