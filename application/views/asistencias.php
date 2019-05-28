<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="container">
<form action="<?php echo base_url();?>index.php/menu/grafica_asistencias" method="POST">
  <div class="row">
        <h3>Datos Generales del control de asistencia alimenticia</h3>
        <div class='col-sm-3'>
            <div class="form-group">
            <?php echo form_error('fecha_inicial');?>
            <h4>Fecha_Aplicación:</h4>
                <div class='input-group date'>
                    <input type='date' class="form-control" value="<?php $fecha = date('Y-m-d');
         $nuevafecha = strtotime ( '0 day' , strtotime ( $fecha ) ) ;$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); echo $nuevafecha;?>" name="fecha_inicial"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <h4>Grupo:</h4>
                 <select class="form-control" name="grupo">
                    <option selected="" value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                 </select>
            </div>
            <div class="form-group">
                <h4>Grado:</h4>
                 <select class="form-control" name="grado">
                    <option selected="" value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                 </select>
            </div>
            <div class="form-group">
                <h4>Modalidad:</h4>
                 <select class="form-control" name="modalidad">
                    <option selected="">DESAYUNO</option>
                    <option>COMIDA</option>
                 </select>
            </div>
            <div class="form-group">
                <input type='submit' class="btn btn-primary" value="ENVIAR DATOS"/>
            </div>
        </div>
    </div>
  </form>
</div>

</body>