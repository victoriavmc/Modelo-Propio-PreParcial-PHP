<?php
require './includes/conexion.php';

class Login
{
    protected $Log_id;
    protected $Log_usuario;
    protected $Log_contrasenia;
    protected $Log_correo;
    protected $Log_pinOlvido;


    public function __construct($Log_id, $Log_usuario, $Log_contrasenia, $Log_correo, $Log_pinOlvido)
    {
        $this->Log_id = $Log_id;
        $this->Log_usuario = $Log_usuario;
        $this->Log_contrasenia = $Log_contrasenia;
        $this->Log_correo = $Log_correo;
        $this->Log_pinOlvido = $Log_pinOlvido;
    }
    public function getLog_id()
    {
        return $this->Log_id;
    }
    // Métodos para obtener y establecer el valor de Log_usuario
    public function getLog_usuario()
    {
        return $this->Log_usuario;
    }

    public function setLog_usuario($Log_usuario)
    {
        $this->Log_usuario = $Log_usuario;
    }

    // Métodos para obtener y establecer el valor de Log_contrasenia
    public function getLog_contrasenia()
    {
        return $this->Log_contrasenia;
    }

    public function setLog_contrasenia($Log_contrasenia)
    {
        $this->Log_contrasenia = $Log_contrasenia;
    }

    // Métodos para obtener y establecer el valor de Log_correo
    public function getLog_correo()
    {
        return $this->Log_correo;
    }

    public function setLog_correo($Log_correo)
    {
        $this->Log_correo = $Log_correo;
    }

    // Métodos para obtener y establecer el valor de Log_pinOlvido
    public function getLog_pinOlvido()
    {
        return $this->Log_pinOlvido;
    }

    public function setLog_pinOlvido($Log_pinOlvido)
    {
        $this->Log_pinOlvido = $Log_pinOlvido;
    }
    # BACKENT 
    public function crearJefe()
    {
        $Log_id = $this->getLog_id();
        $user = $this->getLog_usuario();
        $password = $this->getLog_contrasenia();
        $correo = $this->getLog_correo();
        $pinOlvido = $this->getLog_pinOlvido();

        $bd = conectarBD();
        $consulta = "INSERT INTO login (Log_id, Log_usuario, Log_contrasenia, Log_correo, Log_pinOlvido) VALUES ('$Log_id', '$user', '$password', '$correo', '$pinOlvido')";

        mysqli_query($bd, $consulta);
        mysqli_close($bd);
    }

    public function recuperarUsuario($contrasenia, $user, $correo)
    {
        $bd = conectarBD();
        $consulta = "UPDATE login SET Log_contrasenia='$contrasenia' WHERE Log_usuario='$user' and Log_correo ='$correo'";
        $resultado = mysqli_query($bd, $consulta);
        return $resultado;
    }

    public function newPinOlvido($pinOlvido, $user,$correo)
    {
        $bd = conectarBD();
        $consulta = "UPDATE login SET Log_pinOlvido = '$pinOlvido' WHERE Log_usuario='$user' and Log_correo ='$correo'";
        $resultado = mysqli_query($bd, $consulta);
        return $resultado;
    }

    public function enviarMail($user, $correo){
        $bd = conectarBD();
        $consulta = "SELECT Log_pinOlvido FROM login WHERE Log_usuario='$user' and Log_correo='$correo'";
        $resultado = mysqli_query($bd, $consulta);
        $fila = mysqli_fetch_array($resultado);
        // Resultados Obtenidos
        $pin = $fila['Log_pinOlvido'];

        //Armar mensaje
        $to = $correo;
        $subject = "Recuperar contraseña";
        $message = "Su pin de recuperación es: $pin";
        $headers = 'From: testingcodevictoriavmc@gmail.com'."\r\n".
        'Reply-To: victoriavmcPREPARCIAL@gmail.com';

        // Envío del correo electrónico
        if (mail($to, $subject, $message, $headers)) {
            // Muestra un mensaje si el correo se envió correctamente
            return true;
        } else {
            // Muestra un mensaje de error si falla el envío del correo
            return false;
        }
    }

    public function actualizarUsuario($id, $user, $password, $correo)
    {
        $bd = conectarBD();

        $consulta = "UPDATE login SET Log_usuario = '$user', Log_contrasenia='$password', Log_correo = '$correo'
        WHERE Log_id = $id";

        $resultado = mysqli_query($bd, $consulta);
        return $resultado;
    }
    public function eliminarUsuario($id)
    {
        $bd = conectarBD();
        $consulta = "DELETE FROM login WHERE Log_id = $id";
        $resultado = mysqli_query($bd, $consulta);
        return $resultado;
    }
}
