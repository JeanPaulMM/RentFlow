<?php
// PropiedadController.php - Controlador
class PropiedadController {
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Incluir el modelo para manipular las propiedades
            require_once __DIR__.'/../models/propiedadModel.php';
            
            // Crear una instancia del modelo
            $propiedad = new Propiedad();
            
            // Llamar al método para guardar la propiedad y las fotos
            $resultado = $propiedad->guardarPropiedad($_POST, $_FILES);
            
            // Verificar el resultado
            if ($resultado) {
                // Si el resultado es exitoso, redirigir a otra página o mostrar mensaje de éxito
                echo "Propiedad y fotos guardadas exitosamente.";
            } else {
                // Si hubo un error, mostrar mensaje de error
                echo "Error al guardar propiedad o fotos.";
            }
        }
    }
}
