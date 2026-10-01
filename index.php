<?php
include 'includes/header.php';
?>

<main class="container my-5">
    <section class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h2 class="h4 card-title text-center mb-4 fw-bold">Formulario de Registro de Aspirantes</h2>
                    
                    <form action="procesar.php" method="POST" enctype="multipart/form-data">
                        
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">Nombre (Requerido):</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Sofía" required>
                        </div>

                        <!-- Apellido -->
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-semibold">Apellido (Requerido):</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ej. Rodríguez" required>
                        </div>

                        <!-- Identificación -->
                        <div class="mb-3">
                            <label for="identificacion" class="form-label fw-semibold">Identificación (Requerido):</label>
                            <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Ej. 8-950-1234" required>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label fw-semibold">Fecha de Nacimiento (Requerido):</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        </div>

                        <!-- Sexo -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold d-block">Sexo (Requerido):</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="sexo" id="sexo_hombre" value="Hombre" required>
                                    <label class="btn btn-outline-secondary w-100 py-2" for="sexo_hombre">Hombre</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="sexo" id="sexo_mujer" value="Mujer" required>
                                    <label class="btn btn-outline-secondary w-100 py-2" for="sexo_mujer">Mujer</label>
                                </div>
                            </div>
                        </div>

                        <!-- Fotografía del Aspirante -->
                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold">Fotografía del Aspirante (png, jpg, jpeg, gif, webp):</label>
                            <input class="form-control" type="file" id="foto" name="foto" accept=".png,.jpg,.jpeg,.gif,.webp" required>
                        </div>

                        <!-- Botón Submit -->
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Registrar Aspirante</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'includes/footer.php';
?>