<?php
    // Si el método de solicitud es POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre']; // Obtener el valor del campo "nombre"
        $email = $_POST['email']; // Obtener el valor del campo "email"

        // Conectarse a la base de datos
        $mysqli = new mysqli('db', 'root', '', 'formulario');

        // Preparar la consulta
        $stm = $mysqli->prepare("INSERT INTO usuarios (nombre, email) 
                                VALUES (?, ?)");

        // Vincular los parámetros
        $stm->bind_param("ss", $nombre, $email);
        
        // Ejecutar la consulta
        $stm->execute();

        // Cerrar la conexión
        $stm->close();

        echo "$name y $email guardados correctamente";
    }
?>