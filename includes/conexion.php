<?php

function conectarBD()
{
    $bd = mysqli_connect('localhost', 'root', '', 'preparcial');

    if (!$bd) {
        echo ('No se pudo conectar a la base de datos');
    }

    return $bd;
}
