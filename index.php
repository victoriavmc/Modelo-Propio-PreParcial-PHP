<?php
// Se requiere el archivo que contiene la clase Login
require './clases/Login.php';

// Se requiere la conexión a la base de datos
require_once './includes/conexion.php';

// Se establece la conexión a la base de datos
$bd = conectarBD();

// Iniciar la sesión
session_start();

// Verifica si se está enviando una solicitud POST desde el frontend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se obtienen los datos ingresados por el usuario desde el formulario
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Se construye la consulta SQL para buscar el usuario y contraseña ingresados en la base de datos
    $consulta = "SELECT Log_id FROM login WHERE Log_usuario='$usuario' AND Log_contrasenia='$contrasenia'";
    // Se ejecuta la consulta en la base de datos
    $resultado = mysqli_query($bd, $consulta);
    // Obtener el Log_id de la fila de resultados
    $row = mysqli_fetch_assoc($resultado);
    $id = $row['Log_id'];
    // Ahora $id contiene el valor de Log_id

    // Verifica si se encontraron filas en el resultado (es decir, si el usuario y la contraseña son válidos)
    if ($resultado->num_rows != 0) {
        // Establecer la sesión del usuario segun su id
        $_SESSION['Log_id'] = $id;
        $_SESSION['Log_usuario'] = $usuario;
        // Redirigir al usuario a la página de detalles del usuario
        header('location: ./pag1.php');
    } else {
        // Si los datos son inválidos, muestra un mensaje de error
        echo "<script>alert('Error al ingresar sus datos! Intente nuevamente');</script>";
        // Limpia el mensaje de error después de mostrarlo
        unset($_SESSION['error_message']);
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
        <div class=ladoIzq>
            <img src="./estilo/Imagen/Logo.png" alt="Espiritu Libre">
        </div>
        <div class="ladoDere">
            <div class="romboContainer">
                <img class="romboIMG" src="./estilo/Imagen/Rombo.png" width="650" height="800" alt="Rombo Ingresar">
                <div class="contenidoRombo">
                    <h1>¡Bienvenido!</h1>
                    <img src="./estilo/Imagen/User.jpeg" width="120" alt="Login"><br>
                    <form method="post">
                        <label for='usuario'>Usuario:</label>
                        <input id=usuario type="text" name="usuario" placeholder="Usuario" size="50" required>
                        <label for='contra'>Contraseña:</label>
                        <input id=contra type="password" name="contrasenia" placeholder="Contraseña" size="50" required>
                        <a href="./recuperar.php">Problemas para iniciar sesión?</a>
                        <button> Inicio de Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    // Ruta a la plantilla
    $template_path = 'estilo/Templates/piePag.php';
    // Se incluye la plantilla
    include $template_path; ?>...