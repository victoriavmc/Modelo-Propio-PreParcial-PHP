<?php
require_once 'clases/Empleados.php';
$empleado = new Empleado(null, null, null, null, null, null, null, null, null, null, null);

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cuit = $_POST['cuit'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $barrio = $_POST['barrio'];
    $calle = $_POST['calle'];
    $altura = $_POST['altura'];
    $puesto = $_POST['puesto'];
    $ingresoAlSistema = $_POST['ingreso_al_sistema'];
    $salario = $_POST['salario'];

    // Llama a la función crearEmpleado() con los parámetros correctos
    $resultado = $empleado->crearEmpleado($nombre, $apellido, $cuit, $fechaNacimiento, $barrio, $calle, $altura, $puesto, $ingresoAlSistema, $salario);

    // Verificar si la operación de inserción fue exitosa
    if ($resultado) {
        echo "<script>alert('Empleado registrado correctamente.');</script>";
    } else {
        echo "<script>alert('Error: El formulario NO pudo ser guardado correctamente.');</script>";
    }
}
?>

<!DOCTYPE html>
<?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/navegador.php';
// Se incluye la plantilla
include $template_path; ?>
</head>

<body>
    <div class=contenedorPrincipal>

        <div class=costadoIzq>
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/selector.php';
            // Se incluye la plantilla
            include $template_path; ?>
        </div>
        <div class="marcoDerecho">
            <div class="imagenYTitulo">
                <div class="imagenEmpleado">
                    <img src="estilo/Imagen/Empleado.jpeg" width="120" alt="Empleado">
                </div>
                <div class=tituloBusca>
                    <h1> REGISTRAR EMPLEADO:</h1>
                </div>
            </div>
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/volver.php';
            // Se incluye la plantilla
            include $template_path; ?>
            <form method="POST">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>

                <label for="apellido">Apellido:</label><br>
                <input type="text" id="apellido" name="apellido" required><br>

                <label for="cuit">CUIT:</label><br>
                <input type="text" id="cuit" name="cuit" required><br>

                <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

                <label for="barrio">Barrio:</label><br>
                <input type="text" id="barrio" name="barrio"><br>

                <label for="calle">Calle:</label><br>
                <input type="text" id="calle" name="calle"><br>

                <label for="altura">Altura:</label><br>
                <input type="number" id="altura" name="altura"><br>

                <label for="puesto">Puesto:</label><br>
                <input type="text" id="puesto" name="puesto"><br>

                <label for="ingreso_al_sistema">Fecha de Ingreso al Sistema:</label><br>
                <input type="date" id="ingreso_al_sistema" name="ingreso_al_sistema" required><br>

                <label for="salario">Salario:</label><br>
                <input type="number" id="salario" name="salario" required><br><br>

                <input type="submit" value="Registrar Empleado">
            </form>
            <!-- Mostrar Planilla Asi nota modificacion -->
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/mostrarPlanilla.php';
            // Se incluye la plantilla
            include $template_path; ?>
        </div>
    </div>
    <?php
    // Ruta a la plantilla
    $template_path = 'estilo/Templates/piePag.php';
    // Se incluye la plantilla
    include $template_path; ?>