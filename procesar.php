<?php
include 'includes/header.php';

$errores = [];
$datos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Obtener y Limpiar Entradas (Saneamiento y Seguridad)
    $nombreRaw = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellidoRaw = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
    $identificacionRaw = isset($_POST['identificacion']) ? trim($_POST['identificacion']) : '';
    $fechaNacimientoRaw = isset($_POST['fecha_nacimiento']) ? trim($_POST['fecha_nacimiento']) : '';
    $sexoRaw = isset($_POST['sexo']) ? trim($_POST['sexo']) : '';

    $nombreClean = htmlspecialchars(strip_tags($nombreRaw));
    $apellidoClean = htmlspecialchars(strip_tags($apellidoRaw));
    $identificacionClean = htmlspecialchars(strip_tags($identificacionRaw));
    $sexoClean = htmlspecialchars(strip_tags($sexoRaw));

    // Normalización: Formato Tipo Título (ej. "norma" -> "Norma")
    $datos['nombre'] = ucwords(strtolower($nombreClean));
    $datos['apellido'] = ucwords(strtolower($apellidoClean));

    // Normalización: Identificación a Mayúsculas
    $datos['identificacion'] = strtoupper($identificacionClean);
    $datos['sexo'] = $sexoClean;

    // 2. Validación de campos obligatorios
    if (empty($datos['nombre']) || empty($datos['apellido']) || empty($datos['identificacion']) || empty($fechaNacimientoRaw) || empty($datos['sexo'])) {
        $errores[] = "Todos los campos del formulario son obligatorios.";
    }

    // 3. Cálculo de Edad y Validación de Rango (18 a 70 años)
    if (!empty($fechaNacimientoRaw)) {
        try {
            $fechaNac = new DateTime($fechaNacimientoRaw);
            $hoy = new DateTime();
            $edad = $hoy->diff($fechaNac)->y;

            if ($edad < 18 || $edad > 70) {
                $errores[] = "La edad del aspirante debe estar entre 18 y 70 años. (Edad ingresada: {$edad} años).";
            } else {
                $datos['fecha_nacimiento'] = $fechaNac->format('d/m/Y');
                $datos['edad'] = $edad;
            }
        } catch (Exception $e) {
            $errores[] = "Formato de fecha de nacimiento no válido.";
        }
    }

    // 4. Subida y Validación de la Fotografía
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoTmpName = $_FILES['foto']['tmp_name'];
        $fotoOriginalName = basename($_FILES['foto']['name']);
        $ext = strtolower(pathinfo($fotoOriginalName, PATHINFO_EXTENSION));

        $extensionesPermitidas = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

        if (!in_array($ext, $extensionesPermitidas)) {
            $errores[] = "Tipo de archivo no permitido. Solo se aceptan: png, jpg, jpeg, gif, webp.";
        } else {
            $directorioDestino = 'uploaded_files/';
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0755, true);
            }

            // Nombre seguro e único para evitar sobreescribir archivos
            $nuevoNombreFoto = uniqid('aspirante_', true) . '.' . $ext;
            $rutaFinal = $directorioDestino . $nuevoNombreFoto;

            if (move_uploaded_file($fotoTmpName, $rutaFinal)) {
                $datos['foto_ruta'] = $rutaFinal;
                $datos['foto_nombre'] = $nuevoNombreFoto;
            } else {
                $errores[] = "Error al guardar la fotografía en la carpeta del servidor.";
            }
        }
    } else {
        $errores[] = "Debe seleccionar una fotografía obligatoria.";
    }

} else {
    $errores[] = "Acceso no permitido directamente al procesador.";
}
?>

<main class="container my-5">
    <section class="row justify-content-center">
        <div class="col-md-8">
            
            <?php if (!empty($errores)): ?>
                <!-- Si se encuentran errores de validación -->
                <div class="alert alert-danger shadow-sm rounded-3 p-4" role="alert">
                    <h4 class="alert-heading fw-bold mb-3">Se encontraron errores al procesar:</h4>
                    <ul class="mb-3">
                        <?php foreach ($errores as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <hr>
                    <a href="index.php" class="btn btn-outline-danger fw-semibold">&larr; Volver al formulario</a>
                </div>

            <?php else: ?>
                <!-- Si el registro es totalmente válido -->
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-success text-white py-3">
                        <h3 class="h5 mb-0 fw-bold">¡Aspirante Registrado Exitosamente!</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            
                            <!-- Muestra la foto subida -->
                            <div class="col-md-4 text-center mb-3 mb-md-0">
                                <img src="<?php echo $datos['foto_ruta']; ?>" alt="Foto de <?php echo $datos['nombre']; ?>" class="img-fluid rounded-3 border shadow-sm mb-2" style="max-height: 200px; object-fit: cover;">
                                <p class="small text-muted mb-0">Guardado como:<br><code><?php echo htmlspecialchars($datos['foto_nombre']); ?></code></p>
                            </div>

                            <!-- Muestra la información procesada y estandarizada -->
                            <div class="col-md-8">
                                <table class="table table-striped table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-secondary">Nombre Completo:</th>
                                            <td class="fw-bold"><?php echo $datos['nombre'] . ' ' . $datos['apellido']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-secondary">Identificación:</th>
                                            <td><code><?php echo $datos['identificacion']; ?></code></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-secondary">Fecha de Nacimiento:</th>
                                            <td><?php echo $datos['fecha_nacimiento']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-secondary">Edad Calculada:</th>
                                            <td><span class="badge bg-primary fs-6"><?php echo $datos['edad']; ?> años</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-secondary">Sexo:</th>
                                            <td><?php echo $datos['sexo']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        
                        <!-- Botones de Acción al pie del registro -->
                        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
                            
                            <!-- Formulario/Botón para Eliminar la foto subida y cancelar -->
                            <form action="eliminar.php" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este registro y su fotografía?');">
                                <input type="hidden" name="foto_ruta" value="<?php echo htmlspecialchars($datos['foto_ruta']); ?>">
                                <button type="submit" class="btn btn-outline-danger fw-semibold">
                                    🗑️ Eliminar Aspirante
                                </button>
                            </form>

                            <!-- Botón para registrar otro aspirante -->
                            <a href="index.php" class="btn btn-primary fw-semibold">Registrar Nuevo Aspirante</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
</main>

<?php
include 'includes/footer.php';
?>