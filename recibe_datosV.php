<?php
    //include 'validacion.php';
    require __DIR__."/validacion.php";
    $directorio = "ficheros/";

    if(!file_exists("./ficheros")){
        mkdir("ficheros", 0755);

    if(file_exists("./victoria_archivo.txt")){
            $archivo = file_get_contents("./victoria_archivo.txt");
            $valores_por_defecto = explode("-", $fichero);
            
    }
        
}
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
    if (!empty($devices)) {
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

   if(isset($_FILES['fichero1']) && $_FILES['fichero1']['error'] == UPLOAD_ERR_OK){
    $directorio = "ficheros/";

    $fichero1 = basename($_FILES['fichero1']['name']);
    $fichero1_dir = $directorio.$fichero1;

    $numero = 1;
    $fichero1_path = pathinfo($fichero1);
    while(file_exists($fichero1_dir)){
        $fichero1= $fichero1_path['filename']
        ."_"
        .$numero
        ."." 
        .$fichero1_path['extension'];
        $fichero1_dir =$directorio.$fichero1;
        $numero++;
    }
    move_uploaded_file($_FILES['fichero1']['tmp_name'], $fichero1_dir);

   }
   if(isset($_FILES['fichero2']) && $_FILES['fichero2']['error'] == UPLOAD_ERR_OK){
    $directorio = "ficheros/";

    $fichero2 = basename($_FILES['fichero2']['name']);
    $fichero2_dir = $directorio.$fichero2;

    $numero = 1;
    $fichero2_path = pathinfo($fichero2);
    while(file_exists($fichero2_dir)){
        $fichero2= $fichero2_path['filename']
        ."_"
        .$numero
        ."." 
        .$fichero2_path['extension'];
        $fichero2_dir =$directorio.$fichero2;
        $numero++;
    }
    move_uploaded_file($_FILES['fichero2']['tmp_name'], $fichero2_dir);
}
    ?>
</body>
</html>