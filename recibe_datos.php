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


</body>

</html>