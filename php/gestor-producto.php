<?php
//insertar productos
	if (!empty($_POST['nombre']) && !empty($_POST['tipo']) && !empty($_POST['precio']) && !empty($_POST['oferta']) && !empty($_FILES['foto'])) {
		$insertar= $conn->prepare('INSERT INTO tblproducto(nombre,precio,oferta,foto,tipo_producto) Values(:nombre,:precio,:oferta,:foto,:tipo)');
		$insertar->bindParam(':nombre',$_POST['nombre']);
		$insertar->bindParam(':precio',$_POST['precio']);
		$insertar->bindParam(':oferta',$_POST['oferta']);
		$insertar->bindParam(':tipo',$_POST['tipo']);
		/*insertar una foto*/
        $insertar->bindParam(':foto', $ruta);
        $nombreimg=$_FILES['foto']['name'];
        $archivo=$_FILES['foto']['tmp_name'];
        $ruta='foto/'.$nombreimg;
        move_uploaded_file($archivo, '../'.$ruta);

		if ($insertar->execute()) {
		  $producto="Producto registrado";
		} else {
		  $producto="Producto no registrado";
		}

	}
//Actualizar producto
	if (!empty($_POST['codigo-a']) && !empty($_POST['nombre-a']) && !empty($_POST['tipo-a']) && !empty($_POST['precio-a']) && !empty($_POST['oferta-a']) && !empty($_FILES['foto-a'])) {
		$insertar= $conn->prepare('UPDATE tblproducto SET nombre=:nombre,precio=:precio,oferta=:oferta,tipo_producto=:tipo,foto=:foto WHERE codigo=:codigo');
		$insertar->bindParam(':codigo',$_POST['codigo-a']);
		$insertar->bindParam(':nombre',$_POST['nombre-a']);
		$insertar->bindParam(':precio',$_POST['precio-a']);
		$insertar->bindParam(':oferta',$_POST['oferta-a']);
		$insertar->bindParam(':tipo',$_POST['tipo-a']);
		/*insertar una foto*/
        $insertar->bindParam(':foto', $ruta);
        $nombreimg=$_FILES['foto-a']['name'];
        $archivo=$_FILES['foto-a']['tmp_name'];
        $ruta='../foto/'.$nombreimg;
        move_uploaded_file($archivo, $ruta);

		if ($insertar->execute()) {
		  $producto="Producto actualizado";
		} else {
		  $producto="Producto no actualizado";
		}

	}
	if (!empty($producto)) {
		echo '<span class="alert alert-dark mb-3">'.$producto.'</span>';
	}
//consulta de los productos
	$records_producto = $conn->prepare('SELECT p.foto,p.codigo,p.nombre,tp.nombre as Tipo,p.tipo_producto,p.precio,p.oferta FROM tblproducto as p inner join tbltipo_producto as tp on p.tipo_producto=tp.codigo');
 	$records_producto->execute();
	
?>

<h1 class="modal-title text-center">Productos</h1>
<div class="row">
	<div class="col-sm-6 col-12">
		<a class="btn btn-success text-white mt-5 mb-5" data-toggle="modal" data-target="#registrar">Ingresar producto</a>
	</div>
	<div class="col-sm-6 col-12">
		<a class="btn btn-primary text-white mt-5 mb-5" onclick="ventanaNueva();"><i class="fal fa-file-pdf"></i> Generar Reporte</a>	
	</div>
</div>
<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Imagen</th>
      <th>Código</th>
      <th>Nombre</th>
      <th>Tipo de producto</th>
      <th>Precio Por Kilo</th>
      <th>Oferta</th>
      <th>Acción</th>
    </tr>
  </thead>
  <?php foreach($records_producto as $results) {
   ?>
   <tr>
     <td><img src="../<?php echo $results['foto']; ?>" class="rounded-circle" width="50" height="50"></td>
     <td><?php echo $results['codigo']; ?></td>
     <td><?php echo $results['nombre']; ?></td>
     <td><?php echo $results['Tipo']; ?></td>
     <td><?php echo '$',number_format($results['precio']); ?></td>
     <td><?php echo $results['oferta'],'%'; ?></td>
     <td>
        <a data-toggle="modal" href="#actualizar<?php echo $results['codigo']; ?>" class="pr-3" title="Actualizar"><i class="fa fa-edit text-warning"></i></a>
        <a onclick="return confirmar('../php/eliminar.php?id=<?php echo $results['codigo']; ?>','<?php echo $results['nombre']; ?>','<?php echo $results['precio']; ?>')" class="pl-3" title="Eliminar" data-toggle="tooltip"><i class="fa fa-times text-danger"></i></a>
     </td>
   </tr>
  
  <!-- modal para actualizar-->
<div class="modal fade" id="actualizar<?php echo $results['codigo']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!--formulario ingresar inicio-->
       <form action="" method="post" enctype="multipart/form-data">
	      	<div class="modal-body">
	      		<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Foto</label>
					    <div class="input-group">
					     	<img src="../<?php echo $results['foto']; ?>" class="rounded-circle" width="50" height="50">
						</div>
					</div>
		      	</div>
		      	<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Codigo</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/box.png" width="20" height="20"></span>
							</div>
					     	<input type="text" class="form-control" value="<?php echo $results['codigo']; ?>" name="codigo-a" readonly>
						</div>
					</div>
				</div>
		       <div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Nombre del producto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/box.png" width="20" height="20"></span>
							</div>
					     	<input type="text" class="form-control" value="<?php echo $results['nombre']; ?>" name="nombre-a" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Tipo del producto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/producto.png" width="20" height="20"></span>
							</div>
					     	<input type="text" list="tipos" class="form-control" name="tipo-a" value="<?php echo $results['tipo_producto']; ?>" required>
					     	<datalist id="tipos">
					     		<?php
					     			$records2 = $conn->prepare('SELECT * FROM tbltipo_producto');
			                		$records2->execute();
					                foreach ($records2 as $r) {
					                  echo "<option value=".$r['codigo'].">".$r['nombre']."</option>";
					                } 
					            ?>
					     	</datalist>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Precio</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/coins.png" width="20" height="20"></span>
							</div>
					     	<input type="text" name="precio-a" class="form-control" value="<?php echo $results['precio']; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Oferta</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/discount.png" width="20" height="20"></span>
							</div>
					     	<input type="text" name="oferta-a" class="form-control" value="<?php echo $results['oferta']; ?>" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Foto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/picture.png" width="20" height="20"></span>
							</div>
					     	<input type="file" name="foto-a" class="form-control" required>
						</div>
					</div>
				</div>
		  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button class="btn btn-success border border-dark" type="submit">Registrar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!--fin modal-->

<?php
	}
?>
</table>

<!-- modal para ingresar-->
<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <!--formulario ingresar inicio-->
       <form action="" method="post" enctype="multipart/form-data">
	      	<div class="modal-body">
		       <div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Nombre del producto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/box.png" width="20" height="20"></span>
							</div>
					     	<input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="nombre" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Tipo del producto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/producto.png" width="20" height="20"></span>
							</div>
					     	<input type="text" list="tipos" class="form-control" name="tipo" placeholder="Ingrese el tipo de productos" required>
					     	<datalist id="tipos">
					     		<?php
					     			$records2 = $conn->prepare('SELECT * FROM tbltipo_producto');
			                		$records2->execute();
					                foreach ($records2 as $r) {
					                  echo "<option value=".$r[0].">".$r['nombre']."</option>";
					                } 
					            ?>
					     	</datalist>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Precio</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/coins.png" width="20" height="20"></span>
							</div>
					     	<input type="text" name="precio" class="form-control" placeholder="Ingrese el precio" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Oferta</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/discount.png" width="20" height="20"></span>
							</div>
					     	<input type="text" name="oferta" class="form-control" placeholder="Ingrese el precio" required>
						</div>
					</div>
				</div>
				<div class="form-row">
				  	<div class="col-md-12 mb-3">
					    <label>Foto</label>
					    <div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text border border-dark"><img src="../img/iconos/picture.png" width="20" height="20"></span>
							</div>
					     	<input name="foto" type="file" multiple="multiple" class="form-control"  required>
						</div>
					</div>
		      </div>
		  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button class="btn btn-success border border-dark" type="submit">Registrar</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<!--fin modal-->
<script src="../js/VentanaCentrada.js"></script>
<script>
	function ventanaNueva(){	
		window.open('../reportes/index.php','nuevaVentana','width=1000, height=700');
	}
	
    function confirmar(url,nombre,precio){
		swal({
		title: "¿Quieres eliminar el registro?",
		text:"El registro pertenece a "+nombre+", con un valor de: "+precio,
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			window.location=url;
		}
		});
    } 
</script>
