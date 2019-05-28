<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="container-fluid bg-3 text-center">
<form action="<?php echo base_url();?>index.php/menu/inserta_comentarios" method="POST">
 <?php 
 $i=0;
 $partida=0;
 foreach ($cronograma->result() as $fila) {
   $partida=$fila->id_c;
 }
 foreach($ninos->result() as $row) { $i++;?>
   <div class="row">
     <div class="col-sm-10">
      <label  class="col-sm-1 control-label">CURP:</label><div class="col-sm-5"><input type="text" class="form-control"   value="<?php echo $row->CURP;?>" readonly name="CURP<?php echo $i;?>"/>
     </div>
   </div>
   <div class="col-sm-10">
     <label  class="col-sm-1 control-label">NOMBRE:</label><div class="col-sm-5"><input type="text" class="form-control"   value="<?php echo $row->NOMBRE." ".$row->PATERNO." ".$row->MATERNO;?>" name="NOMBRE" disabled/></div>
    </div>
    <div class="col-sm-10">
     <label  class="col-sm-1 control-label">GRADO:</label><div class="col-sm-5"><input type="text" class="form-control"   value="<?php echo $row->GRADO;?>" name="GRADO" disabled/></div>
    </div>
    <div class="col-sm-10">
     <label  class="col-sm-1 control-label">GRUPO:</label><div class="col-sm-5"><input type="text" class="form-control"   value="<?php echo $row->GRUPO;?>" name="GRUPO" disabled/></div>
    </div>
    <div class="col-sm-10">
        <label  class="col-sm-1 control-label">NIVEL:</label>
        <div class="col-sm-5">
          <select class="form-control" name="NIVEL<?php echo $i;?>">
            <option >MUY POCO</option>
            <option>POCO</option>
            <option>REGULAR</option>
            <option selected="">BIEN</option>
            <option>EXCELENTE</option>
          </select>
         </div>
    </div>
    <div class="col-sm-10">
     <label  class="col-sm-1 control-label">COMENTARIO:</label><div class="col-sm-5"><textarea NAME="COMENTARIO<?php echo $i;?>" class="form-control" rows="3" id="comentario<?php echo $i;?>" placeholder="COLOCA AQUI EL COMENTARIO ACERCA DEL NIÑO. TU OBSERVACIÓN ES IMPORTANTE"></textarea></div>
    </div>
    <div class="col-sm-10">
     <label  class="col-sm-1 control-label">FOTO:</label><div class="col-sm-5"><img src="<?php echo base_url();?>assets/uploads/files/<?php echo $row->FOTO;?>" class="img-responsive" style="width:100%" alt="Image"></div>
    <br>

 </div>
  <?php }?>
  <div class="col-sm-10">
     <label  class="col-sm-1 control-label">TOTAL ALUMNOS DEL GRUPO:</label><div class="col-sm-3"><input type="text" class="form-control"   value="<?php echo $i;?>" name="TOTAL" readonly/></div>
    </div>
    <div class="col-sm-10">
     <label  class="col-sm-1 control-label">Número de Partida:</label><div class="col-sm-3"><input type="text" class="form-control"   value="<?php echo $partida;?>" name="PARTIDA" readonly/></div>
    </div>
  <div class="col-sm-10">
    <input type='submit' class="btn btn-primary" value="ENVIAR DATOS"/>
  </div>
  </form>
</div>
</body>