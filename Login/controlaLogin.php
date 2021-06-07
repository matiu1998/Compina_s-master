<?php
    session_start();
    include ("../Conexion/conexion.php");

    //recibiendo datos del form. Evita ataque sql injection
	$user_login = mysqli_real_escape_string($conexion,$_POST['user_login']);
	$password = mysqli_real_escape_string($conexion,$_POST['password']);

    //consulta a la BD
	$result = mysqli_query($conexion,"SELECT * FROM users WHERE user_login='$user_login' and password='$password' ");

    //La consulta se almacena en una array
	$row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result)!=0) {
		$_SESSION['id'] = $row['id'];
        $_SESSION['id_people'] = $row['id_people'];
		$_SESSION['user_login'] = $row['user_login'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['type_user'] = $row['type_user'];
		$_SESSION['active'] = $row['active'];
		$_SESSION['create_at'] = $row['create_at'];
		$_SESSION['update_at'] = $row['update_at']; 
		header("Location: ../Cliente"); 
	}else {
		echo "<script>alert('Error..intente otra vez'); location.href='index.php';</script>";
	}
	mysqli_free_result($result);
	mysqli_close($conexion);
    
    // $_SESSION['usuario'] = "-1";

    // $usuario=$_POST['usuario'];
    // $password=md5($_POST['password']);

    // $sql = "SELECT * FROM users where user_login = '$usuario' and password = '$password'";
    // $result = mysqli_query($conexion,$sql);

    // while($datos = mysqli_fetch_array($result)){
    //     $_SESSION['usuario'] = $datos['id_people'];
    //     $_SESSION['type'] = $datos['type_user'];
    // }

    // if(!isset($_SESSION['type'])){
    //     //header('Location: ../Hola');
    //     echo "Hola";
    // }else{
    //     if($_SESSION['usuario'] != "-1"){
    //         header('Location: ../Hola');
    //     }
    // }

    // if($_SESSION['usuario'] != "-1" && $_SESSION['type'] == "Administrador"){
    //     header("Location: ../Cliente");
    // }
    // else{
    //     header("Location: ../Login/?mensaje=Datos incorrectos");
    // }

    
    
?>