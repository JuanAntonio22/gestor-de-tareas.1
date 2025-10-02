<?php
    //backend/agregar.php

    require 'config.php';

    $conn = get_db_connection();

    //leer y deocodificar el JSON enviado por javascript
    $data = json_decode(file_get_contents('php://input'));
    $descripcion = $data->descripcion ?? '';

    if (!empty($descripcion)) {
        //uso de prepared statements para evitar SQL injection
        $stmt = $conn->prepare("INSERT INTO tareas (descripcion) VALUES (?)");
        $stmt->bind_param("s", $descripcion);

        if ($stmt->execute()) {
            echo json_encode(['success'=> true, 'id'=>$stmt->insert_id, 'descripcion'=>$descripcion]);   
        }else{
            echo json_encode(['success'=> false,'message'=> 'Error al agregar la tarea.']);
        }
        $stmt->close();
    }else{
        echo json_encode(['success'=> false,'message'=> 'Descripcion vacia.']);
    }   
    $conn->close();
?>