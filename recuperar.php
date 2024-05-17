<?php
// Se requiere el archivo que contiene la clase Login
require './clases/Login.php';

// Se requiere la conexión a la base de datos
require_once './includes/conexion.php';

// Se establece la conexión a la base de datos
$bd = conectarBD();

// Verifica si se está enviando una solicitud POST desde el frontend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se obtienen los datos ingresados por el usuario desde el formulario
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $pinOlvido = $_POST['pinOlvido'];

    // Se construye la consulta SQL para buscar el usuario, correo y pin de olvido en la base de datos
    $consulta = "SELECT * FROM login WHERE Log_usuario='$usuario' AND Log_correo='$correo' AND Log_pinOlvido='$pinOlvido'";

    // Se ejecuta la consulta en la base de datos
    $resultado = mysqli_query($bd, $consulta);

    // Verifica si se encontraron filas en el resultado (es decir, si los datos ingresados son válidos)
    if ($resultado->num_rows != 0) {
        // Si los datos son válidos, se inicia una sesión y se guarda el nombre de usuario en la variable de sesión
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $correo;
        // Luego se redirige al usuario a la página nuevoContrasenia.php
        header('location: ./nuevoContrasenia.php');
    } else {
        // Si los datos son inválidos, muestra un mensaje de error
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
include $template_path; ?>

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
                        <input id=usuario type="text" name="usuario" placeholder="Usuario" size="50" required>
                        <label for='correo'>Correo:</label>
                        <input id=correo type="text" name="correo" placeholder="Correo" size="50" required>
                        <label for='pinOlv'>Pin Olvido:</label>
                        <input id=pinOlv type="text" name="pinOlvido" placeholder="Pin Olvido" size="50" required>
                        <button> Recuperar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Ruta a la plantilla
    $template_path = 'estilo/Templates/piePag.php';
    // Se incluye la plantilla
    include $template_path; ?>...