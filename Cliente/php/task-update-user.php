<?php
    session_start();
    include "../../Conexion/conexion.php";
    if (isset($_POST['name'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $telefono = $_POST['phone'];

        $query = "UPDATE people SET name='$name', last_name='$last_name', birthdate='$birthdate', email='$email',
        phone='$telefono' WHERE id = '$id' ";
        $result = $conexion->query($query);
        if ($result){
            echo 'Update';
        } else {
            echo 'Faild';
        }
    }
?>