<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="container-fluid bg-3 text-center">
<?php 
  $k=0;
  $filas=$detalle_menus->num_rows();
   for($i=0;$i<$filas;$i++){?>
 <div class="row">
 <?php $modalidad=$detalle_menus->row_array($i); ?>
 <div class="well"><h4><?php echo $modalidad['modalidad'];?></h4></div>
 <?php 
     $num=$detalle_menus->row_array($i);
     for($j=0;$j<$num["num"];$j++){?>
    <div class="col-sm-3">
      <?php $alimento=$menus->row_array($k);?>
      <p><?php echo $alimento['nombre_a'];?></p>
      <p><?php echo $alimento['fecha'];?></p>
      <a href="<?php echo base_url();?>index.php/menu/elimina_alimento/<?php echo $alimento['id_detalle'];?>">Eliminar Alimento</a>
      <img src="<?php echo base_url();?>assets/uploads/files/<?php echo $alimento['ruta'];?>" class="img-responsive" style="width:100%" alt="Image">
    </div><br>
    <?php  $k++;
     }?>
  </div><br>
  <?php 
}?>
</div>
</body>