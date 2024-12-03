
<?php
require_once __DIR__.'/../../conexion/conexion.php';
// Propiedad.php - Modelo
class Propiedad {
    private $conexion;

    // Constructor para inicializar la conexión
    public function __construct() {
        $this->conexion = Conexion::conectar(); // Obtiene la instancia de conexión
    }

    // Método para guardar la propiedad en la base de datos
    public function guardarPropiedad($data, $files) {
        // Extraemos los datos del formulario
        $titulo = $data['titulo'];
        $descripcion = $data['descripcion'];
        $precio = $data['precio'];
        $ubicacion = $data['ubicacion'];
        $tipo = $data['tipo'];
        $capacidad = $_POST['capacidad'];
        $user = $_POST['user'];
        $ciudad = $_POST['ciudad'];


        // Insertar la propiedad en la tabla 'propiedades'
        $query = "INSERT INTO propiedades (titulo, descripcion, precio, ubicacion, capacidad, tipo, usuario_id, ciudad_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute([$titulo, $descripcion, $precio, $ubicacion, $capacidad, $tipo, $user, $ciudad]);

        // Obtener el ID de la propiedad insertada
        $propiedadId = $this->conexion->lastInsertId();

        // Manejar las imágenes
        return $this->guardarFotos($propiedadId, $files);
    }

    // Método para guardar las fotos asociadas a la propiedad
    public function guardarFotos($propiedadId, $files) {
        $resultado = true;
    
        // Verificar si se han subido imágenes
        if (!empty($files['imagenes']['tmp_name'][0])) {
            foreach ($files['imagenes']['tmp_name'] as $index => $tmpName) {
                // Validar el tipo de archivo
                $fileType = mime_content_type($tmpName);
                if (!in_array($fileType, ['image/jpeg', 'image/png'])) {
                    throw new Exception("Solo se permiten imágenes JPG o PNG.");
                }
    
                // Validar el tamaño del archivo
                $fileSize = filesize($tmpName);
                if ($fileSize > 2 * 1024 * 1024) { // 2 MB máximo
                    throw new Exception("Las imágenes no deben superar los 2 MB.");
                }
    
                // Construir el nombre del archivo
                $fotoNombre = time() . "_" . $files['imagenes']['name'][$index];
                $directorioDestino = 'public/img/propiedades/';
                $urlFoto = $directorioDestino . $fotoNombre;
    
                // Subir la foto al servidor
                if (move_uploaded_file($tmpName, $urlFoto)) {
                    // Insertar la foto en la base de datos
                    $query = "INSERT INTO fotos (propiedad_id, url_foto) VALUES (?, ?)";
                    $stmt = $this->conexion->prepare($query);
                    if (!$stmt->execute([$propiedadId, $urlFoto])) {
                        $resultado = false; // Fallo al guardar en la base de datos
                    }
                } else {
                    $resultado = false; // Fallo al mover el archivo
                }
            }
        } else {
            $resultado = false; // No se subieron imágenes
        }
    
        return $resultado;
    }
}    
