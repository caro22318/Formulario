
<?php 
    //valores por defecto del formulario.
    $valorFormulario = ["name" => "Victoria", "email" => "Hola@gmail.com", "web" => "https://www.google.com"];
?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Datos</title>
    <style>
        .error { color: #ff0000; }
    </style>
</head>
<body>
<form method="post" action="salida.php">

    
    <b>Nombre</b><br><input type="text" name="name" placeholder="Ingrese su nombre" value = <? $valoresFormulario[name]?> ><br>
    <br><b>Correo electrónico</b> <br> <input type="text" name="email" placeholder="Ingrese un correo válido"><br>
    <br><b>Sitio Web</b> <br><input type="text" name="web" placeholder="URL"><br>
   
    <br><textarea name="comment" placeholder= "Inserte un comentario.." rows="5" cols="40"></textarea><br>

    <b>Género</b><br>
    <input type="radio" name="gender" value="Mujer">Mujer
    <input type="radio" name="gender" value="Hombre">Hombre
    <input type="radio" name="gender" value="Otro">Otro<br><br>

    <b><label for ="devices">Dispositivos en propiedad:</label><b><br>
    <select id ="devices" name="devices[]" multiple>
        <option value="Tablet" selected>Tablet</option><br>
        <option value="Ordenador de mesa" selected>Ordenador de mesa</option><br>
        <option value="Portátil" selected>Portátil</option>
        <option value="Consola" selected>Consola</option>
    </select>
    <br><br><label for="aviso">¿Quieres que te llegue un correo con la recogida de datos?</label>
    <input type ="checkbox" id="aviso" name="aviso" check><br>

    <br><input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
