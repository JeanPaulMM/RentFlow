<?php
require_once __DIR__.'/../models/consultasModel.php';

class ConsultasController{

    public static function mostrarCiudades() {
        return ConsultasModel::traerCiudades();
    }

    public static function mostrarCiudadesFotos() {
        return ConsultasModel::obtenerCiudadesConFotos();
    }

    public static function mostrarCiudadesRndm() {
        return ConsultasModel::obtenerCiudadesRndm();
    }

    public static function mostrarPropiedades(){
        return ConsultasModel::traerPropiedades();
    }

    public static function infoPropiedad($id){
        return ConsultasModel::TraerInfoPropiedad($id);
    }
}