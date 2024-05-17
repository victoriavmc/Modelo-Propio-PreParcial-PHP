<?php
$template_path = "includes/conexion.php";
include_once($template_path);

// Establecer la conexión
$conexion = conectarBD();

// Consulta SQL para obtener todos los empleados
$sql_todos = "SELECT * FROM empleado";
$resultado_todos = mysqli_query($conexion, $sql_todos);

?>

<div class="tituloBusca">
    <h1>Planilla de Empleados</h1>
    <div class="cuadroPlanilla">
        <div class="cuadritoEmpleado">
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
                        echo "<tr>";
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
</div>