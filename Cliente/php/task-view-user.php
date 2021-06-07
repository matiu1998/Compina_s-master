<?php
    include '../../Conexion/conexion.php';
    session_start();
    $idUsuario = $_SESSION['usuario'];
    $json = array();
    $query = "SELECT * FROM people WHERE id = '$idUsuario'";
    $result = $conexion->query($query);
    while ($row = $result->fetch_array()){
        $json[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'last_name' => $row['last_name'],
            'birthdate' => $row['birthdate'],
            'email' => $row['email'],
            'phone' => $row['phone']
        );
    }
    echo json_encode($json[0]);
?> 