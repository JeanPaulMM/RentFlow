<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'Conexion.php'; // Asegúrate de usar tu clase de conexión
    $conn = Conexion::conectar();

    // Datos del primer modal
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $ubicacion = $_POST['ubicacion'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];
    $user = $_POST['user'];

    try {
        // Inicia la transacción
        $conn->beginTransaction();

        // Inserción en la tabla `propiedades`
        $stmt = $conn->prepare("INSERT INTO propiedades (titulo, descripcion, precio) VALUES (:titulo, :descripcion, :precio)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        $propiedad_id = $conn->lastInsertId(); // Obtiene el ID de la propiedad recién creada

        // Procesamiento de las imágenes
        if (isset($_FILES['imagenes'])) {
            $imagenes = $_FILES['imagenes'];
            $uploadDir = '../../site/images'; // Directorio de almacenamiento

            foreach ($imagenes['tmp_name'] as $index => $tmpName) {
                if ($imagenes['error'][$index] === UPLOAD_ERR_OK) {
                    $nombreArchivo = basename($imagenes['name'][$index]);
                    $rutaArchivo = $uploadDir . $nombreArchivo;

                    // Mueve la imagen al directorio
                    if (move_uploaded_file($tmpName, $rutaArchivo)) {
                        // Inserta el registro en la tabla `fotos`
                        $stmt = $conn->prepare("INSERT INTO fotos (propiedad_id, url_foto) VALUES (:propiedad_id, :url_foto)");
                        $stmt->bindParam(':propiedad_id', $propiedad_id);
                        $stmt->bindParam(':url_foto', $nombreArchivo); // Guarda solo el nombre del archivo
                        $stmt->execute();
                    } else {
                        throw new Exception("Error al mover la imagen $nombreArchivo");
                    }
                }
            }
        }

        // Confirma la transacción
        $conn->commit();
        echo "Propiedad e imágenes registradas exitosamente.";
    } catch (Exception $e) {
        // En caso de error, deshace la transacción
        $conn->rollBack();
        echo "Error: " . $e->getMessage();
    }
}