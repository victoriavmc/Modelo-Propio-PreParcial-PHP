<?php
// Se requiere el archivo que contiene la clase Login
require './clases/Login.php';

// Se requiere la conexión a la base de datos
require_once './includes/conexion.php';

// Iniciar la sesión
session_start();

// Establecer la conexión a la base de datos
$bd = conectarBD();

// Obtener el nombre de usuario y el correo de la sesión
$user = $_SESSION['usuario'];
$correo = $_SESSION['correo'];

// Crear una instancia de la clase Login
$resultado = new Login(null, null, null, null, null);

// Verificar si se está enviando una solicitud POST desde el frontend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la nueva contraseña ingresada por el usuario desde el formulario
    $contrasenia = $_POST['contrasenia'];

    // Llamar al método recuperarUsuario de la clase Login para actualizar la contraseña en la base de datos
    $resultadoRecuperacion = $resultado->recuperarUsuario($contrasenia, $user, $correo);

    // Verificar si la recuperación de la contraseña fue exitosa
    if ($resultadoRecuperacion) {
        // Si la recuperación fue exitosa, actualizar el nombre de usuario en la sesión
        $_SESSION['usuario'] = $user;
        $_SESSION['correo'] = $correo;
        // Redirigir al usuario a la página newPin.php para establecer un nuevo PIN
        header('Location: ./newPin.php');
    } else {
        // Si hubo un error en la recuperación de la contraseña, mostrar un mensaje de error
        echo "<script>alert('Error al ingresar sus datos!');</script>";
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
include $template_path;?>
</head>

<body>
    <div class=contenedorPrincipal>
        <div class=ladoIzq>
            <img src="./estilo/Imagen/Logo.png" alt="Espiritu Libre">
        </div>
        <div class="ladoDere">
            <div class="romboContainer">
                <div class='volver'>
                    <a href="./index.php"><img src="./estilo/Imagen/Atras.jpeg" width='50' alt="Volver"></a>
                </div>
                <img class="romboIMG" src="./estilo/Imagen/Rombo.png" width="800" alt="Rombo Ingresar">
                <div class="contenidoRombo">
                    <h1>Reestablecer</h1>
                    <img src="./estilo/Imagen/User.jpeg" width="120" alt="Login"><br>
                    <form method="post">
                        <label for='usuario'>Usuario:</label>
                        <input id=usuario type="text" placeholder="Usuario" size="50" disabled value="<?php echo $user ?>">
                        <label for='contra'>Nueva Contraseña:</label>
                        <input id=contra type="password" name="contrasenia" placeholder="Contraseña" size="50" required>
                        <button> Actualizar Datos</button>
                </div>
            </div>
        </div>
    </div>

    <?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/piePag.php';
// Se incluye la plantilla
include $template_path;?>...