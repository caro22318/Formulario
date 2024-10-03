<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <center>
        <h1>Hola! Gracias por registrate a este formulario </h1>
    </center>
    <?php
    // Incluir el archivo de funciones de validación
    include 'funciones_validacion.php';

    $errores = []; // Array para almacenar errores

    // Validación de los datos recibidos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['name'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];

        // Validaciones
        if (!validar_nombre($name)) {
            $errores[] = "El nombre es inválido.";
        }

        if (!validar_apellido($apellido)) {
            $errores[] = "El apellido es inválido.";
        }

        if (!validar_email($email)) {
            $errores[] = "El correo electrónico es inválido.";
        }

        if (!validar_genero($genero)) {
            $errores[] = "Debe seleccionar un género.";
        }

        // Mostrar errores o resultados
        if (!empty($errores)) {
            echo "<h2>Errores encontrados:</h2>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo '<a href="javascript:history.back()">Volver al formulario</a>';
        } else {
            echo "<h2>Formulario procesado correctamente.</h2>";
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Apellido: $apellido</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Género: $genero</p>";
        }
    }
    ?>

<?php
function cargarValoresPorDefecto($filename = 'valores_defecto.txt') {
    $valores = [];
    if (file_exists($filename)) {
        $archivo = fopen($filename, "r");
        while (($linea = fgets($archivo)) !== false) {
            $linea = trim($linea);
            list($clave, $valor) = explode('=', $linea);
            $valores[$clave] = $valor;
        }
        fclose($archivo);
    }
    return $valores;
}

$valores = cargarValoresPorDefecto();
$nombre_defecto = isset($valores['nombre']) ? $valores['nombre'] : '';
$apellido_defecto = isset($valores['apellido']) ? $valores['apellido'] : '';
$email_defecto = isset($valores['email']) ? $valores['email'] : '';
?>
<?php
function guardarFichero($fichero, $carpeta = 'ficheros') {
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $nombre_fichero = basename($fichero['name']);
    $ruta_fichero = $carpeta . '/' . $nombre_fichero;

    // Si el archivo ya existe, se le añade un sufijo _N
    if (file_exists($ruta_fichero)) {
        $info_fichero = pathinfo($ruta_fichero);
        $base = $info_fichero['filename'];
        $extension = $info_fichero['extension'];
        $contador = 1;

        do {
            $nuevo_nombre_fichero = $base . '_' . $contador . '.' . $extension;
            $ruta_fichero = $carpeta . '/' . $nuevo_nombre_fichero;
            $contador++;
        } while (file_exists($ruta_fichero));
    }

    move_uploaded_file($fichero['tmp_name'], $ruta_fichero);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['fichero1'])) {
        guardarFichero($_FILES['fichero1']);
    }
    if (isset($_FILES['fichero2'])) {
        guardarFichero($_FILES['fichero2']);
    }

    // Redirigir o mostrar un mensaje
    echo "Archivos subidos correctamente.";
}
?>
<?php
function almacenarEnFichero($datos, $archivo = 'datos_formulario.txt') {
    $linea = '';
    foreach ($datos as $campo => $valor) {
        $linea .= "$campo: $valor" . PHP_EOL;
    }
    file_put_contents($archivo, $linea, FILE_APPEND); // Añade al archivo
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campos = [
        'nombre' => $_POST['name'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email']
    ];

    almacenarEnFichero($campos); // Guardar datos en el archivo
    echo "Datos almacenados correctamente.";
}
?>



</body>

</html>