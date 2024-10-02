<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Validar que el nombre no esté vacío y que tenga más de 2 caracteres
function validar_nombre($nombre) {
    return isset($nombre) && !empty($nombre) && strlen($nombre) > 2;
}

// Validar que el apellido no esté vacío y que tenga más de 2 caracteres
function validar_apellido($apellido) {
    return isset($apellido) && !empty($apellido) && strlen($apellido) > 2;
}

// Validar el formato del email
function validar_email($email) {
    return isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Validar que se haya seleccionado un género
function validar_genero($genero) {
    $generos_validos = ['Femenino', 'Masculino', 'Otros'];
    return isset($genero) && in_array($genero, $generos_validos);
}
?>

 
</body>
</html>