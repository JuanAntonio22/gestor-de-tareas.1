<?php
    //backend/obtener.php
    require 'config.php';
    $conn = get_db_connection();
    $result = $conn->query("SELECT id, descripcion FROM tareas ORDER BY id DESC");

    $trareas = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $trareas[] = $row;
        }
    }

    echo json_encode(['success'=> true, 'tareas'=>$trareas]);
    $conn->close();
?>