<!DOCTYPE html>
<?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/navegador.php';
// Se incluye la plantilla
include $template_path;
?>
</head>

<body>
    <div class="contenedorPrincipal">

        <div class="costadoIzq">
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/selector.php';
            // Se incluye la plantilla
            include $template_path;
            ?>
        </div>
        <div class="marcoDerecho">
            <div class="imagenYTitulo">
                <div class="imagenEmpleado">
                    <img src="estilo/Imagen/Empleado.jpeg" width="150" alt="Empleado">
                </div>
                <div class=tituloBusca>
                    <h1> ELIMINAR EMPLEADO:</h1>
                </div>

            </div>
            <?php

            // Ruta a la plantilla
            $template_path = 'estilo/Templates/volver.php';
            // Se incluye la plantilla
            include $template_path;
            // Incluir identificaEmpleado.php para obtener el ID del empleado a eliminar
            $template_path = 'estilo/Templates/identificaEmpleado.php';
            include $template_path;

            // Verificar si se encontró un empleado con el ID proporcionado
            if (!empty($idEmpleadoBuscado)) {
                // Incluir la clase Empleado
                require_once 'clases/Empleados.php';

                // Crear una instancia de la clase Empleado
                $empleado = new Empleado(null, null, null, null, null, null, null, null, null, null, null);

                // Llamar a la función eliminarEmpleado con el ID del empleado a eliminar
                $eliminado = $empleado->eliminarEmpleado($idEmpleadoBuscado);

                if ($eliminado) {
                    echo "<script>
                alert('Empleado eliminado correctamente.');
                window.location.href = 'pag1.php';
            </script>";
                } else {
                    echo "<script>
                alert('Error al eliminar empleado.');
                window.location.href = 'pag1.php';
            </script>";
                }
            }
            ?>
        </div>
    </div>
    <?php
    // Ruta a la plantilla
    $template_path = 'estilo/Templates/piePag.php';
    // Se incluye la plantilla
    include $template_path;
    ?>
</body>

</html>