
<?php
    function test_input($data) {
     $data = trim($data); // Elimina los espacios en blanco del principio y del final de la cadena.
     $data = stripslashes($data); // Elimina las barras invertidas (\) 
     $data = htmlspecialchars($data); // Convierte caracteres especiales en entidades HTML
     return $data; // Devuelve la cadena convertida
    }   

    //validar los datos

    function validar_nombre($name) {
        if (empty($name)) {
            return "El nombre es obligatorio.";
        }
        return "";
    }

    function validar_email($email) {
        if (empty($email)) {
            return "El email es obligatorio.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Formato de email inválido.";
        }
        return "";
    }

    function validar_web($web) {
    if (empty($web)) {
        return "";
    } elseif (!filter_var($web, FILTER_VALIDATE_URL)) {
        return "Formato de URL inválido.";
    }
    return "";
}
        if(empty($_POST["comment"])){
            $comment = "" ;
        } else{
            $comment = test_input($_POST["comment"]);
        }

        function validar_genero($gender) {
            if (empty($gender)) {
                return "El género es obligatorio.";
            }
            return "";
        }

    ?>
