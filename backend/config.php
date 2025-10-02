<?php
    //backend/config.php

    define('DB_HOST', 'localhost');
    define('DB_USER', 'app_user');  //usuario creado o 'root'
    define('DB_PASS','backend123'); //contraseña del usuario
    define('DB_NAME','gestor_tareas');

    //funcion para obtener la conexion
    function get_db_connection(){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error){
            //en un error real, no muestrar el error al usuario
            die("Conexion fallida: " . $conn->connect_error);
        }
        return $conn;
    }

    header('Content-Type: application/json');
?>