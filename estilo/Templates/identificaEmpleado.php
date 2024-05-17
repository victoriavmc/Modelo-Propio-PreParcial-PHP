<?php
$template_path = "includes/conexion.php";
include_once($template_path);

// Establecer la conexión
$conexion = conectarBD();

// Consulta SQL para obtener todos los empleados
$sql_todos = "SELECT * FROM empleado";
$resultado_todos = mysqli_query($conexion, $sql_todos);

// Inicializar una variable para almacenar el ID del empleado buscado
$idEmpleadoBuscado = '';

// Verificar si se recibió un ID de empleado a través de GET
if (isset($_GET['id'])) {
    // Escapar el ID del empleado para prevenir inyección SQL
    $idEmpleado = mysqli_real_escape_string($conexion, $_GET['id']);

    // Consulta SQL para buscar el empleado por ID
    $sql_busqueda = "SELECT * FROM empleado WHERE Emp_id = '$idEmpleado'";
    $resultado_busqueda = mysqli_query($conexion, $sql_busqueda);

    // Verificar si se encontró algún resultado
    if (mysqli_num_rows($resultado_busqueda) > 0) {
        // Devolver el ID del empleado encontrado
        $empleado = mysqli_fetch_assoc($resultado_busqueda);
        $idEmpleadoBuscado = $empleado['Emp_id'];
    } else {
        // Si no se encuentra ningún empleado, mostrar mensaje de alerta
        echo "<script>alert('No hay ningún empleado con ese ID.');</script>";
    }
}
?>

<div class="cuadroPlanilla">
    <div class="filtro">
        <form method="GET" action="">
            <label for="id">ID del Empleado:</label>
            <input type="text" id="id" name="id" placeholder="ID Empleado">
            <input type="image" src="estilo/Imagen/Buscar.jpeg" width="20" alt="Buscar" class="centrarImgBuscar">
        </form>
    </div>
    <div class=cuadritoEmpleado>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>CUIT</th>
                <th>Fecha de Nacimiento</th>
                <th>Barrio</th>
                <th>Calle</th>
                <th>Altura</th>
                <th>Puesto</th>
                <th>Ingreso al Sistema</th>
                <th>Salario</th>
            </tr>
            <?php
            // Mostrar los datos de los empleados en la tabla
            if ($resultado_todos->num_rows > 0) {
                while ($row = $resultado_todos->fetch_assoc()) {
                    // Añadir la clase 'empleado-encontrado' si el ID coincide con el ID buscado
                    $claseEmpleadoEncontrado = ($row["Emp_id"] == $idEmpleadoBuscado) ? 'empleado-encontrado' : '';
                    echo "<tr class='$claseEmpleadoEncontrado'>";
                    echo "<td>" . $row["Emp_id"] . "</td>";
                    echo "<td>" . $row["Emp_nombre"] . "</td>";
                    echo "<td>" . $row["Emp_apellido"] . "</td>";
                    echo "<td>" . $row["Emp_cuit"] . "</td>";
                    echo "<td>" . $row["Emp_fechaNacimiento"] . "</td>";
                    echo "<td>" . $row["Emp_barrio"] . "</td>";
                    echo "<td>" . $row["Emp_calle"] . "</td>";
                    echo "<td>" . $row["Emp_altura"] . "</td>";
                    echo "<td>" . $row["Emp_puesto"] . "</td>";
                    echo "<td>" . $row["Emp_ingresoAlSistema"] . "</td>";
                    echo "<td>" . $row["Emp_salario"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No hay empleados</td></tr>";
            }
            ?>
        </table>
    </div>
</div>