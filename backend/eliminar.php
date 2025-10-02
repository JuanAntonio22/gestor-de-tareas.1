<?php
    //backend/eliminar.php

    require 'config.php';

    $conn = get_db_connection();

    //leer y deocodificar el JSON enviado por javascript
    $data = json_decode(file_get_contents('php://input'));
    $id = $data->id ?? 0;

    if ($id) {
        $stmt = $conn->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['success'=> true, 'id' =>$id]);
        }else{
            echo json_encode(['success'=> false,'message'=> 'Error al eliminar la tarea.']);
        }

        $stmt->close();
    }else{
        echo json_encode(['success'=> false,'message'=> 'ID de la tarea requerido.']);
    }
    $conn->close();

?>