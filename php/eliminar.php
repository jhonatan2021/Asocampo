<?php
	session_start();
	require 'conexion.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('DELETE FROM tblproducto WHERE codigo = :id');
    $records->bindParam(":id", $_GET['id']);
	$records->execute();
	if($records) { 
		header('location: ../sesion/admin.php?p=gestor-producto');
	} else { 
		echo "Error al Eliminar";
	} 		
}else{
  header('location: ../');
}
?>