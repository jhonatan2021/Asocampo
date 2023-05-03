<?php
require 'conexion.php';
//Insertando la información
$sql = $conn->prepare("INSERT INTO tblcliente(identificacion, nombres, apellidos, telefono, correo, contrasena) VALUES (:identificacion,:nombres,:apellidos,:telefono,:correo,:contrasena)");
$sql->bindParam(':identificacion', $_POST['identificacion']);
$sql->bindParam(':nombres', $_POST['nombres']);
$sql->bindParam(':apellidos', $_POST['apellidos']);
$sql->bindParam(':telefono', $_POST['telefono']);
$sql->bindParam(':correo', $_POST['correo']);
$password = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
$sql->bindParam(':contrasena', $password);

if ($sql->execute()) {
  header('location: sesion.php');
} else {
  echo "No se puede crear el registro";
}
?>