<?php
require_once 'includes/conexion.php';



class Empleado
{
    public $Emp_Id;
    public $Emp_Nombre;
    public $Emp_Apellido;
    public $Emp_Cuit;
    public $Emp_FechaNacimiento;
    public $Emp_Barrio;
    public $Emp_Calle;
    public $Emp_Altura;
    public $Emp_Puesto;
    public $Emp_IngresoAlSistema;
    public $Emp_Salario;


    public function __construct($Emp_Id = NULL, $Emp_Nombre, $Emp_Apellido, $Emp_Cuit, $Emp_FechaNacimiento, $Emp_Barrio, $Emp_Calle, $Emp_Altura, $Emp_Puesto,  $Emp_IngresoAlSistema, $Emp_Salario)
    {
        $this->Emp_Id = $Emp_Id;
        $this->Emp_Nombre = $Emp_Nombre;
        $this->Emp_Apellido = $Emp_Apellido;
        $this->Emp_Cuit = $Emp_Cuit;
        $this->Emp_FechaNacimiento = $Emp_FechaNacimiento;
        $this->Emp_Barrio = $Emp_Barrio;
        $this->Emp_Calle = $Emp_Calle;
        $this->Emp_Altura = $Emp_Altura;
        $this->Emp_Puesto = $Emp_Puesto;
        $this->Emp_IngresoAlSistema = $Emp_IngresoAlSistema;
        $this->Emp_Salario = $Emp_Salario;
    }

    public function crearEmpleado($nombre, $apellido, $cuit, $fechaNacimiento, $barrio, $calle, $altura, $puesto, $ingresoAlSistema, $salario)
    {
        $id = NULL; // No necesitas asignar NULL aquí ya que $id se inicializará en la consulta SQL.

        // Asigna los parámetros a las propiedades del objeto Empleado
        $this->Emp_Nombre = $nombre;
        $this->Emp_Apellido = $apellido;
        $this->Emp_Cuit = $cuit;
        $this->Emp_FechaNacimiento = $fechaNacimiento;
        $this->Emp_Barrio = $barrio;
        $this->Emp_Calle = $calle;
        $this->Emp_Altura = $altura;
        $this->Emp_Puesto = $puesto;
        $this->Emp_IngresoAlSistema = $ingresoAlSistema;
        $this->Emp_Salario = $salario;

        $bd = conectarBD();
        $consulta = "INSERT INTO empleado (Emp_nombre, Emp_apellido, Emp_cuit, Emp_fechaNacimiento, Emp_barrio, Emp_calle, Emp_altura, Emp_puesto, Emp_ingresoAlSistema, Emp_salario) VALUES ('$nombre', '$apellido', '$cuit', '$fechaNacimiento', '$barrio', '$calle', '$altura', '$puesto', '$ingresoAlSistema', '$salario')";
        // Ejecutar la consulta
        if (mysqli_query($bd, $consulta)) {
            mysqli_close($bd);
            return true; // Devolver true si la inserción fue exitosa
        } else {
            mysqli_close($bd);
            return false; // Devolver false si hubo algún error
        }
    }

    public function modificarEmpleado($id, $nombre, $apellido, $cuit, $fecha, $barrio, $calle, $altura, $salario, $ingresoAlSistema, $puesto)
    {
        $bd = conectarBD();
        $consulta = "UPDATE empleado SET Emp_nombre='$nombre', Emp_apellido='$apellido', Emp_cuit='$cuit', Emp_fechaNacimiento='$fecha', Emp_barrio='$barrio', Emp_calle='$calle', Emp_altura='$altura', Emp_puesto='$puesto', Emp_ingresoAlSistema='$ingresoAlSistema', Emp_salario='$salario' WHERE Emp_id='$id'";
        if (mysqli_query($bd, $consulta)) {
            mysqli_close($bd);
            return true; // Devolver true si la inserción fue exitosa
        } else {
            mysqli_close($bd);
            return false; // Devolver false si hubo algún error
        }
    }
    public function eliminarEmpleado($id)
    {
        $bd = conectarBD();
        $consulta = "DELETE FROM empleado WHERE Emp_Id = $id";
        if (mysqli_query($bd, $consulta)) {
            mysqli_close($bd);
            return true; // Devolver true si la inserción fue exitosa
        } else {
            mysqli_close($bd);
            return false; // Devolver false si hubo algún error
        }
    }
}
