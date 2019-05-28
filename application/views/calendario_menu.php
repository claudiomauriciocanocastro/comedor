<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="well"><h2>Mi logo</h4></div>
<div class="container">
<form action="<?php echo base_url();?>index.php/menu/valida_fechas_menu" method="POST">
  <div class="row">
        <h3>Selecciona un rango de fechas para mostrar el menú</h3>
        <div class='col-sm-3'>
            <div class="form-group">
            <?php echo form_error('fecha_inicial');?>
            Fecha_Inicial
                <div class='input-group date'>
                    <input type='date' class="form-control" value="<?php $fecha = date('Y-m-d');
         $nuevafecha = strtotime ( '0 day' , strtotime ( $fecha ) ) ;$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); echo $nuevafecha;?>" name="fecha_inicial"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
            <?php echo form_error('fecha_final');?>
            Fecha_Final
                <div class='input-group date'>
                    <input type='date' value="<?php $fecha = date('Y-m-d');
         $nuevafecha = strtotime ( '+5 day' , strtotime ( $fecha ) ) ;$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); echo $nuevafecha;?>" class="form-control" name="fecha_final"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <input type='submit' class="btn btn-primary" value="ENVIAR DATOS"/>
            </div>
        </div>
    </div>
  </form>
</div>
</body>