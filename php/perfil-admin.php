<?php
//Actualizar datos
if (!empty($_POST['documento']) && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['clave1']) && !empty($_POST['clave2'])) {
	if ($_POST['clave1']==$_POST['clave2']) {
		$actualizar= $conn->prepare('UPDATE tbladmin SET identificacion=:identificacion,nombres=:nombres,apellidos=:apellidos,telefono=:telefono,correo=:correo,contrasena=:contrasena WHERE identificacion=:identificacion');
		$actualizar->bindParam(':identificacion',$_POST['documento']);
		$actualizar->bindParam(':nombres',$_POST['nombre']);
		$actualizar->bindParam(':apellidos',$_POST['apellidos']);
		$actualizar->bindParam(':telefono',$_POST['telefono']);
		$actualizar->bindParam(':correo',$_POST['correo']);
		$password = password_hash($_POST['clave1'], PASSWORD_BCRYPT);
		$actualizar->bindParam(':contrasena',$password);


		if ($actualizar->execute()) {
		  $perfil="Perfil actualizado";
		} else {
		  $perfil="Perfil no actualizado";
		}
	}else{
		$perfil="Las contraseñas no coinciden";
	}
	
}
//Actualizar foto de perfil
if (!empty($_FILES['foto']) && !empty($_POST['identificacion'])) {
	$foto_a=$conn->prepare('UPDATE tbladmin SET identificacion=:identificacion,foto=:foto WHERE identificacion=:identificacion');
	$foto_a->bindParam(':identificacion',$_POST['identificacion']);
	/*insertar una foto*/
    $foto_a->bindParam(':foto', $ruta);
    $nombreimg=$_FILES['foto']['name'];
    $archivo=$_FILES['foto']['tmp_name'];
    $ruta='../foto/perfil/'.$nombreimg;
    move_uploaded_file($archivo, $ruta);
    if ($foto_a->execute()) {
	  $perfil="Foto actualizado";
	} else {
	  $perfil="Foto no actualizado";
	}

}
if (!empty($perfil)) {
	echo '<span class="alert alert-dark mb-3">'.$perfil.'</span>';
}

?>
<h1 class="modal-title text-center">Perfil</h1>
<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6 text-center border border-success">
			<div class="row">
				<div class="col-12">
					<img src="<?php echo $user['foto']; ?>" width="200" height="200" class="rounded-circle bg-light border border-dark" name="foto">
				</div>
			</div>
			<div class="form-row">
			  	<div class="col-md-12 mb-3">
				    <label>Documentos</label>
				    <div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text border border-dark"><img src="../img/iconos/picture.png" width="20" height="20"></span>
						</div>
						<input type="text" name="identificacion" value="<?php echo $user['identificacion']; ?>" class="d-none" readonly>
				     	<input type="file" class="form-control" name="foto">
					</div>
				</div>
			</div>
			<input type="submit" class="btn btn-primary border border-dark mt-4" value="Actualizar Foto de perfil">
		</div>
		<div class="col-3"></div>
	</div>
</form>
<form class="needs-validation" action="" method="post">
	<div class="form-row">
	  	<div class="col-md-12 mb-3">
		    <label>Documentos</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/id-card.png" width="20" height="20"></span>
				</div>
		     	<input type="text" class="form-control" name="documento" value="<?php echo $user['identificacion']; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="form-row">
	  	<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Nombres</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/users.png" width="20" height="20"></span>
				</div>
		     	<input type="text" class="form-control" name="nombre" value="<?php echo $user['nombres']; ?>" required>
			</div>
		</div>
		<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Apellidos</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/users.png" width="20" height="20"></span>
				</div>
		     	<input type="text" class="form-control" name="apellidos" value="<?php echo $user['apellidos']; ?>" required>
			</div>
		</div>
	</div>
	<div class="form-row">
	  	<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Teléfono</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/smartphone.png" width="20" height="20"></span>
				</div>
		     	<input type="text" class="form-control" name="telefono" value="<?php echo $user['telefono']; ?>" required>
			</div>
		</div>
		<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Correo eléctronico</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/gmail.png" width="20" height="20"></span>
				</div>
		     	<input type="text" class="form-control" name="correo" value="<?php echo $user['correo']; ?>" required>
			</div>
		</div>
	</div>
	<div class="form-row">
	  	<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Contraseña</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/lock.png" width="20" height="20"></span>
				</div>
		     	<input type="password" class="form-control" name="clave1" placeholder="Ingrese la contraseña" required>
			</div>
		</div>
		<div class="col-md-6 mb-3">
		    <label for="validationCustom03">Confirmar contraseña</label>
		    <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text border border-dark"><img src="../img/iconos/lock.png" width="20" height="20"></span>
				</div>
		     	<input type="password" class="form-control" name="clave2" placeholder="Ingrese otra vez la contraseña" required>
			</div>
		</div>
	</div>
	<span class="alert alert-danger">Para cambiar los datos debes ingresar la contraseña</span><br>
	<input type="submit" class="btn btn-primary border border-dark mt-4" value="Actualizar datos" >
</form>