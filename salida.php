<?php
    include 'validacion.php';

        //almacenar errores
    $nameErr = $emailErr = $genderErr = $webErr = "";
        //almacenar datos
    $name = $email = $gender = $comment = $web = "";
    $devices =[];

    //recoge y limpia los valores
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $web = test_input($_POST["web"]);
        $comment = test_input($_POST["comment"]);
        $gender = isset($_POST["gender"]) ? test_input($_POST["gender"]) : "";
        $devices= isset($_POST["devices"]) ? $_POST["devices"] : [];
    }

       //validar
    $nameErr = validar_nombre($name);
    $emailErr = validar_email($email);
    $webErr = validar_web($web);
    $genderErr = validar_genero($gender);


       // Si no hay errores, mostrar los datos
 if (empty($nameErr) && empty($emailErr) && empty($webErr) && empty($genderErr)) {
    echo "<h2>Datos enviados correctamente:</h2>";
    echo "<b>Nombre:</b> $name<br>";
    echo "<b>Email:</b> $email<br>";
    echo "<b>Sitio Web:</b> $web<br>";
    echo "<b>Comentario:</b> $comment<br>";
    echo "<b>Género:</b> $gender<br>";
 
    // Mostrar los dispositivos seleccionados
    if (!empty('devices')) {
        echo "<b>Dispositivos en propiedad:</b> " . implode(', ', $devices) . "<br>";
    }else{
        echo "<b>No ha seleccionado ningún dispositivo.</b><br>";
    }
    // Confirmación si se seleccionó el aviso
    if (isset($_POST['aviso'])) {
        "<b>Has solicitado recibir un correo de confirmación.</b><br>";
    }else{
        echo"<b>No recibir un correo de confirmación.</b><br>";
    }

} else {
    // Mostrar errores si los hay
    echo "<h2>Errores encontrados:</h2>";
    if ($nameErr) echo "<p><b>Nombre:</b> $nameErr</p>";
    if ($emailErr) echo "<p><b>Email:</b> $emailErr</p>";
    if ($webErr) echo "<p><b>Sitio Web:</b> $webErr</p>";
    if ($genderErr) echo "<p><b>Género:</b> $genderErr</p>";
    }
    ?>
</body>
</html>