<?php
// Incluir la clase Login y la conexión a la base de datos
require './clases/Login.php';
require_once './includes/conexion.php';

// Iniciar la sesión
session_start();

$bd = conectarBD();
$user = $_SESSION['usuario'];
$correo = $_SESSION['correo'];

$resultado = new Login(null, null, null, null, null);

// Generar un nuevo PIN de olvido
$codigoAleatorio = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 6)), 0, 6);

// Actualizar el PIN de olvido en la base de datos
$resultado->newPinOlvido($codigoAleatorio, $user, $correo);

// Asignar el nuevo PIN de olvido a la sesión
$_SESSION['codigoAleatorio'] = $codigoAleatorio;

// Envía el correo electrónico con el PIN de olvido
$mensaje = $resultado->enviarMail($user, $correo);

if ($mensaje) {
    echo "<script>alert('Se ha enviado un correo con su pin de Olvido.');</script>";
} else {
    echo "<script>alert('No se ha podido enviar el correo');</script>";
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
                    <img src="./estilo/Imagen/User.jpeg" width="120" alt="Login"><br>
                    <h1>SU NUEVO PIN DE OLVIDO</h1>
                    <div class="cuadroMostrar">
                        <!-- PHP para mostrar el PIN de olvido -->
                        <p><?php echo isset($_SESSION['codigoAleatorio']) ? $_SESSION['codigoAleatorio'] : ''; ?></p><br>
                    </div>
                    <a href="./index.php"><button>Volver a la página principal</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/piePag.php';
// Se incluye la plantilla
include $template_path;?>...