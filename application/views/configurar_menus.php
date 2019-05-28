<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
<div class="container">
<form action="<?php echo base_url();?>index.php/menu/ingresar_menu" method="POST">
  <div class="row">
        <h3>Datos Generales de los Menús</h3>
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
                <h4>Administrador:</h4>
                 <select class="form-control" name="administrador">
                    <option selected="">ADMIN1234</option>
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
                <h4>Alimento1:</h4>
                <?php echo form_error('alimento1');?>
                 <select class="form-control" name="alimento1">
                 <option selected></option>
                 <?php if ($alimento!=FALSE){ 
                     foreach($alimento->result() as $row) { ?>
                    <option value="<?php echo $row->id_alimento;?>"><?php echo $row->nombre_a;?></option>
                  <?php }}?>
                 </select>
            </div>
            <div class="form-group">
                <h4>Alimento2:</h4>
                   <?php echo form_error('alimento2');?>
                 <select class="form-control" name="alimento2">
                 <option selected></option>
                 <?php if ($alimento!=FALSE){ 
                     foreach($alimento->result() as $row) { ?>
                    <option value="<?php echo $row->id_alimento;?>"><?php echo $row->nombre_a;?></option>
                  <?php }}?>
                 </select>
            </div>
            <div class="form-group">
                <h4>Alimento3:</h4>
                 <select class="form-control" name="alimento3">
                 <option selected></option>
                 <?php if ($alimento!=FALSE){ 
                     foreach($alimento->result() as $row) { ?>
                    <option value="<?php echo $row->id_alimento;?>"><?php echo $row->nombre_a;?></option>
                  <?php }}?>
                 </select>
            </div>
            <div class="form-group">
                <h4>Alimento4:</h4>
                 <select class="form-control" name="alimento4">
                 <option selected></option>
                 <?php if ($alimento!=FALSE){ 
                     foreach($alimento->result() as $row) { ?>
                    <option value="<?php echo $row->id_alimento;?>"><?php echo $row->nombre_a;?></option>
                  <?php }}?>
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