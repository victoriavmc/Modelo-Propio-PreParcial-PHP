<?php
// Se requiere el archivo que contiene la clase Login
require_once './clases/Login.php';

// Se requiere la conexión a la base de datos
require_once './includes/conexion.php';

// Establecer la conexión a la base de datos
$bd = conectarBD();

// Iniciar la sesión
session_start();

// Obtener el id del usuario de la sesión
$id = $_SESSION['Log_id'];

// Consultar la base de datos para obtener los detalles del usuario
$consulta = "SELECT Log_usuario, Log_contrasenia, Log_correo FROM login WHERE Log_id ='$id'";
$resultado = mysqli_query($bd, $consulta);

// Verificar si la consulta tiene resultados
if ($resultado && mysqli_num_rows($resultado) > 0) {
    // Obtener la fila de resultados como un array asociativo
    $row = mysqli_fetch_assoc($resultado);

    // Extraer los detalles del usuario de la fila
    $usuario = $row['Log_usuario'];
    $contrasenia = $row['Log_contrasenia'];
    $correo = $row['Log_correo'];
}
// Crear una instancia de la clase Login
$login = new Login(null, null, null, null, null);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['recuperar'])) {
        // Envía el correo electrónico con el PIN de olvido
        $mensaje = $login->enviarMail($usuario, $correo);
    } elseif (isset($_POST['modificar'])) {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $correo = $_POST['correo'];

        // Actualizar datos del usuario en la base de datos
        $resultado = $login->actualizarUsuario($id, $usuario, $contrasenia, $correo);
        // Verificar si la actualización fue exitosa o no
        if ($resultado) {
            echo '<script>alert("Actualización exitosa.");</script>';
            header('location: ./pag1.php');
        } else {
            echo '<script>alert("Error al actualizar. Por favor, inténtelo de nuevo.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/navegador.php';
// Se incluye la plantilla
include $template_path; ?>

<body>
    <div class="contenedorPrincipal">
        <div class="ladoIzq">
            <img src="./estilo/Imagen/Logo.png" alt="Espíritu Libre">
        </div>
        <div class="ladoDere">
            <div class="romboContainer">
                <div class="volver">
                    <a href="./pag1.php"><img src="./estilo/Imagen/Atras.jpeg" width="50" alt="Volver"></a>
                </div>
                <img class="romboIMG" src="./estilo/Imagen/Rombo.png" width="800" alt="Rombo Ingresar">
                <div class="contenidoRombo">
                    <img src="./estilo/Imagen/User.jpeg" width="120" alt="Login"><br>
                    <form method="post">
                        <label for="usuario">Usuario:</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Usuario" size="50" value="<?php echo $usuario ?>" required>
                        <label for="correo">Correo:</label>
                        <input id="correo" type="text" name="correo" placeholder="Correo" size="50" value="<?php echo $correo ?>" required>
                        <label for="contrasenia">Contraseña:</label>
                        <input id="contrasenia" type="password" name="contrasenia" placeholder="Contraseña" size="50" value="<?php echo $contrasenia ?>" required>
                        <label for="pinOlvido">Pin Olvido:</label>
                        <button type="submit" name="recuperar">Recuperar</button>
                        <button type="submit" name="modificar">Modificar</button>
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
</body>

</html>