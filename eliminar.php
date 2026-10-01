<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['foto_ruta'])) {
    
    // Obtener y limpiar la ruta enviada
    $fotoRuta = $_POST['foto_ruta'];

    // Validar por seguridad que la ruta esté dentro de la carpeta 'uploaded_files/'
    // para evitar que intenten borrar otros archivos del sistema
    if (strpos($fotoRuta, 'uploaded_files/') === 0 && file_exists($fotoRuta)) {
        // Eliminar el archivo físico del servidor
        unlink($fotoRuta);
    }
}

// Redireccionar al formulario principal tras eliminar
header("Location: index.php");
exit();
?>