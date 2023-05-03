<?php
  require 'conexion.php';
//consulta de los productos
  $records = $conn->prepare('SELECT nombre, precio, oferta, foto FROM tblproducto WHERE tipo_producto=1');
  $records->execute();
while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
  if ($results['oferta']>0) {
    $descuento=$results['precio']*($results['oferta']/100);
    $total=$results['precio']-$descuento;
    echo '<div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="'.$results['foto'].'" height="150"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">'.$results['nombre'].'</a>
            </h4>
            <h6 style="text-decoration: line-through;" class="text-secondary">Antes: $'.number_format($results['precio']).'</h6>
            <h5>Ahora: $'.$total.'</h5>
            <p class="card-text">Ahorra '.$results['oferta'].'%</p>
          </div>
        </div>
      </div>';
  }else{
     echo '<div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="'.$results['foto'].'" height="150"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">'.$results['nombre'].'</a>
            </h4>
            <h5>$'.number_format($results['precio']).'</h5>
            <p class="card-text">Ahorra '.$results['oferta'].'%</p>
          </div>
        </div>
      </div>';
  }
}
?>