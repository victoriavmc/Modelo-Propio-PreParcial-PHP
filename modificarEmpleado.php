<?php
include 'estilo/Templates/navegador.php';
require_once './includes/conexion.php';
include 'clases/Empleados.php';

// Establecer la conexión
$conexion = conectarBD();
$empleado = null;

// Verificar si se recibió un ID de empleado a través de GET
if (isset($_GET['id'])) {
    $idEmpleado = mysqli_real_escape_string($conexion, $_GET['id']);

    // Consulta SQL para buscar el empleado por ID
    $sql_busqueda = "SELECT * FROM empleado WHERE Emp_id = '$idEmpleado'";
    $resultado_busqueda = mysqli_query($conexion, $sql_busqueda);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($resultado_busqueda) > 0) {
        $empleado = mysqli_fetch_assoc($resultado_busqueda);
    } else {
        echo "<script>alert('No hay ningún empleado con ese ID.'); window.location.href = 'pag1.php';</script>";
        exit; // Asegúrate de que no se sigue ejecutando el código si no se encuentra el empleado
    }
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && $empleado) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cuit = $_POST['cuit'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $barrio = $_POST['barrio'];
    $calle = $_POST['calle'];
    $altura = $_POST['altura'];
    $puesto = $_POST['puesto'];
    $ingresoAlSistema = $_POST['ingresoSistema'];
    $salario = $_POST['salario'];

    $empleadoObj = new Empleado(null, null, null, null, null, null, null, null, null, null, null);
    $modificado = $empleadoObj->modificarEmpleado($idEmpleado, $nombre, $apellido, $cuit, $fechaNacimiento, $barrio, $calle, $altura, $salario, $ingresoAlSistema, $puesto);

    // Verificar si la operación fue exitosa
    if ($modificado) {
        echo "<script>alert('Empleado modificado correctamente.'); window.location.href = 'pag1.php';</script>;</script>";
    } else {
        echo "<script>alert('Error: El formulario NO pudo ser actualizado correctamente.'); window.location.href = 'pag1.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Empleado</title>
</head>

<body>
    <div class="contenedorPrincipal">
        <div class="costadoIzq">
            <?php include 'estilo/Templates/selector.php'; ?>
        </div>
        <div class="marcoDerecho">
            <div class="imagenYTitulo">
                <div class="imagenEmpleado">
                    <img src="estilo/Imagen/Empleado.jpeg" width="150" alt="Empleado">
                </div>
                <div class=tituloBusca>
                    <h1>MODIFICAR EMPLEADO:</h1>
                </div>

            </div>
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/volver.php';
            // Se incluye la plantilla
            include $template_path; ?>
            <form method="GET" action="">
                <label for="id">ID del Empleado:</label>
                <input type="text" id="id" name="id" placeholder="ID Empleado">
                <input type="image" src="estilo/Imagen/Buscar.jpeg" width="20" alt="Buscar" class="centrarImgBuscar">
            </form>
            <?php if ($empleado) : ?>
                <form method="POST">
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $empleado['Emp_nombre']; ?>" required><br>

                    <label for="apellido">Apellido:</label><br>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $empleado['Emp_apellido']; ?>" required><br>

                    <label for="cuit">CUIT:</label><br>
                    <input type="text" id="cuit" name="cuit" value="<?php echo $empleado['Emp_cuit']; ?>" required><br>

                    <label for="fechaNacimiento">Fecha de Nacimiento:</label><br>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $empleado['Emp_fechaNacimiento']; ?>" required><br>

                    <label for="barrio">Barrio:</label><br>
                    <input type="text" id="barrio" name="barrio" value="<?php echo $empleado['Emp_barrio']; ?>" required><br>

                    <label for="calle">Calle:</label><br>
                    <input type="text" id="calle" name="calle" value="<?php echo $empleado['Emp_calle']; ?>"><br>

                    <label for="altura">Altura:</label><br>
                    <input type="number" id="altura" name="altura" value="<?php echo $empleado['Emp_altura']; ?>"><br>

                    <label for="puesto">Puesto:</label><br>
                    <input type="text" id="puesto" name="puesto" value="<?php echo $empleado['Emp_puesto']; ?>"><br>

                    <label for="ingresoSistema">Fecha de Ingreso al Sistema:</label><br>
                    <input type="date" id="ingresoSistema" name="ingresoSistema" value="<?php echo $empleado['Emp_ingresoAlSistema']; ?>" required><br>

                    <label for="salario">Salario:</label><br>
                    <input type="number" id="salario" name="salario" value="<?php echo $empleado['Emp_salario']; ?>" required><br><br>

                    <input type="submit" value="Modificar Datos del Empleado">
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'estilo/Templates/piePag.php'; ?>
</body>

</html>