<!DOCTYPE html>
<?php
// Ruta a la plantilla
$template_path = 'estilo/Templates/navegador.php';
// Se incluye la plantilla
include $template_path; ?>
</head>

<body>
    <div class=contenedorPrincipal>

        <div class=costadoIzq>
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/selector.php';
            // Se incluye la plantilla
            include $template_path; ?>
        </div>
        <div class="marcoDerecho">
            <div class="imagenYTitulo">
                <div class="imagenEmpleado">
                    <img src="estilo/Imagen/Empleado.jpeg" width="120" alt="Empleado">
                </div>
            </div>
            <?php
            // Ruta a la plantilla
            $template_path = 'estilo/Templates/mostrarPlanilla.php';
            // Se incluye la plantilla
            include $template_path; ?>
        </div>
    </div>
    <?php
    // Ruta a la plantilla
    $template_path = 'estilo/Templates/piePag.php';
    // Se incluye la plantilla
    include $template_path; ?>...