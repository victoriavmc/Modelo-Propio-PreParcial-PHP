<?php
session_start();

$usuario = $_SESSION['Log_usuario'];
?>

<div class=selectorIzquierdo>
    <div class=divisorHorizontal>
        <div>
            <img class="divisorHorizontal-imagen" src="estilo/Imagen/img.jpeg" width='100'>
        </div>
        <div class="divisorHorizontal-contenido">
            <div class="admin-salir">
                <div>
                    <p class="divisorHorizontal-texto"><?php echo $usuario; ?></p>
                </div>
                <div>
                    <a class="divisorHorizontal-salir" href="index.php"><img src="estilo/Imagen/Salir.jpeg" alt="cerrar" width='30'></a>
                </div>
            </div>

            <div class="datosPersonales">
                <div>
                    <a href="modificarLogin.php"> Datos Personales
                </div>
                <div>
                    <img src="estilo/Imagen/Modificar.jpeg" width='30' alt="cambiar datos"></a>
                </div>

            </div>

        </div>
    </div class=clickEmpleados>
    <br>
    <br>
    <br>
    <a href="agregarEmpleados.php">
        <li> Agregar Empleados</li>
    </a>
    <a href="modificarEmpleado.php">
        <li> Modificar Empleados</li>
    </a>
    <a href="eliminarEmpleados.php">
        <li> Eliminar Empleados</li>
    </a>
</div>
<div>

</div>