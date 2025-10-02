<?php

$info =
    "php version = 8.2.12" . "<br>" .
    "Loaded Configuration File = C:\xampp\php\php.ini" . "<br>" .
    "memory_limit = 512M" . "<br>" .
    "DOCUMENT_ROOT = C:/xampp/htdocs";

phpinfo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeros pasos en PHP</title>
</head>

<body>
    <h1>
        Parte 1
    </h1>
    <p>
        <?php echo ($info); ?>
        La fehca y hora actuales son: <?php echo date('d/m/Y H:i:s'); ?>
    </p>

    <h1>
        Parte 2
    </h1>
    <p>
        file_uploads = On → Permite que los usuarios suban archivos desde formularios HTML. Si está en Off,
        las subidas están deshabilitadas.

        <br>

        max_execution_time = 60 → Define el tiempo máximo (en segundos) que un script PHP puede ejecutarse
        antes de que el servidor lo interrumpa. Sirve para evitar que procesos se queden colgados.

        <br>

        short_open_tag = Off → Indica si se pueden usar las etiquetas cortas <? ?> en lugar de <?php ?>.
        Al estar en Off, obliga a usar siempre &lt;?php , lo que mejora la compatibilidad del código.

        <br><br>

        <strong>php.ini-development</strong> → Está pensado para programar.
        Muestra los errores en pantalla (<code>display_errors = On</code>), lo que facilita la depuración.
        También tiene configuraciones más permisivas para desarrollo.
        <br
        <strong>php.ini-production</strong> → Está pensado para servidores en producción.
        Oculta los errores al usuario (<code>display_errors = Off</code>) por motivos de seguridad
        y aplica configuraciones más estrictas para mayor estabilidad.
        <br>
        <em>En resumen:</em> Development = útil para programar (ves errores).
        Production = útil para producción (oculta errores y protege la app).
    </p>
</body>

</html>