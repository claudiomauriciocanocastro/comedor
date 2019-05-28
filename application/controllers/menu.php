<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller {

	function __construct()
    {
     parent::__construct();
     $this->load->model('bases_model');
     $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null)
    {
      
      $this->load->view('example.php',(array)$output);
      $this->load->view('footer');
    }

    public function alimentos()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('alimentos');
      $crud->columns('nombre_a','ruta','categoria');
      $crud->set_theme('datatables');
      $crud->required_fields('nombre_a','ruta','categoria');
      $crud->display_as('nombre_a','Alimento');
      $crud->display_as('nombre_c','Categoria');
      $crud->set_field_upload('ruta','assets/uploads/files');
      $this->load->view('header');
      $this->load->view('menu_general');
      $output = $crud->render();
      $this->_example_output($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }

  }

public function administrador()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('administrador');
      $crud->set_theme('datatables');
      $this->load->view('header');
      $this->load->view('menu_general');
      $crud->columns('login','password','CURP');
      $crud->required_fields('login','password','CURP');
      $crud->set_relation('CURP','persona','CURP');
      $output = $crud->render();
      $this->_example_output($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }

  }

public function tutor()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('tutor');
      $crud->set_theme('datatables');
      $this->load->view('header');
      $this->load->view('menu_general');
      $crud->columns('login','password','CURP');
      $crud->required_fields('login','password','CURP');
      $crud->set_relation('CURP','persona','CURP');
      $output = $crud->render();
      $this->_example_output($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }

  }

public function nino()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('nino');
      $crud->set_theme('datatables');
      $this->load->view('header');
      $this->load->view('menu_general');
      $crud->set_relation('CURP','persona','CURP');
      $crud->set_relation('tutor_CURP','tutor','CURP');
      $output = $crud->render();
      $this->_example_output($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }

  }

  public function asistencias()
  {
      $this->load->view('header');
      $this->load->view('menu_general');
      $this->load->view('asistencias');
      $this->load->view('footer');   
  }

  public function menus()
  {
      $data["alimento"]=$this->bases_model->regresa_alimento(); 
      $this->load->view('header');
      $this->load->view('menu_general');
      $this->load->view('configurar_menus',$data);
      $this->load->view('footer');      
  }

  public function elimina_alimento()
  {
   $data["id_detalle"]=$this->uri->segment(3);
   $this->bases_model->eliminarAlimento($data);
   $this->load->view('header');
   $this->load->view('menu_general');
   redirect('/menu/', 'location');  
   $this->load->view('footer');  

  }

  public function personas()
  {
     try{
      $crud = new grocery_CRUD();
      $crud->set_table('persona');
      $crud->set_theme('datatables');
      $crud->set_field_upload('foto','assets/uploads/files');
      $this->load->view('header');
      $this->load->view('menu_general');
      $output = $crud->render();
      $this->_example_output($output);
    }catch(Exception $e){
      show_error($e->getMessage().' --- '.$e->getTraceAsString());
    }

  }
    
    public function index()
    {
        $this->load->view('header');
        $this->load->view('menu_general');
        $this->load->view('calendario_menu');
        $this->load->view('footer');
    }

    public function ingresar_menu()
    {
      $this->load->view('header');
      $this->load->view('menu_general');
      $this->form_validation->set_rules('alimento1','alimento1','required');
      $this->form_validation->set_rules('alimento2','alimento2','required');
      $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El campo %s es obligatorio </div>');
     if ($this->form_validation->run() == FALSE)
         {
           $data["alimento"]=$this->bases_model->regresa_alimento(); 
           $this->load->view('configurar_menus',$data);
           $this->load->view('footer');
         }
     else{
          $fecha_inicial=$this->input->post('fecha_inicial',TRUE);
          $administrador=$this->input->post('administrador',TRUE);  
          $modalidad=$this->input->post('modalidad',TRUE);
          $alimento1=$this->input->post('alimento1',TRUE);  
          $alimento2=$this->input->post('alimento2',TRUE); 
          $alimento3=$this->input->post('alimento3',TRUE);  
          $alimento4=$this->input->post('alimento4',TRUE);
          $data = array(
               'fecha_inicial'=> $fecha_inicial,
               'administrador'  => $administrador,
               'modalidad'=> $modalidad,
               'alimento1'  => $alimento1,
               'alimento2'  => $alimento2,
               'alimento3'  => $alimento3,
               'alimento4'  => $alimento4,
               );
          $this->bases_model->inserta_cronograma($data);
          $lastid = $this->db->insert_id();
          $this->bases_model->inserta_detalle($alimento1,$lastid);
          $this->bases_model->inserta_detalle($alimento2,$lastid); 
          if ($alimento3!='') $this->bases_model->inserta_detalle($alimento3,$lastid);
          if ($alimento4!='') $this->bases_model->inserta_detalle($alimento4,$lastid);
          redirect('/menu/', 'location');         
          }
     }

   public function inserta_comentarios(){
    $TOTAL=$this->input->post('TOTAL',TRUE);

    for($i=1;$i<=$TOTAL;$i++)
    {
      $data = array(
      'CURP'=>$this->input->post('CURP'.$i,TRUE),
      'NIVEL'=>$this->input->post('NIVEL'.$i,TRUE),
      'COMENTARIO'=>$this->input->post('COMENTARIO'.$i,TRUE),
      'PARTIDA'=>$this->input->post('PARTIDA',TRUE),
      );
      $this->bases_model->inserta_asistencias($data);
    }
    $this->load->view('header');
    $this->load->view('menu_general');
    $data['mensaje'] = "Datos Insertados Correctamente verificar el reporte de asistencia";
    $this->load->view('mensajes',$data);
    $this->load->view('footer');
   }

   public function grafica_asistencias(){
    $data = array(
    'fecha_inicial'=> $this->input->post('fecha_inicial',TRUE),
    'grupo'  => $this->input->post('grupo',TRUE),
    'grado'  => $this->input->post('grado',TRUE),
    'modalidad'  => $this->input->post('modalidad',TRUE),);
    $query['ninos']=$this->bases_model->grafica_asistencias($data);
    $query['cronograma']=$this->bases_model->existe_cronograma($data);
    if ($query["ninos"]==FALSE)    
      {
       $this->load->view('header');
       $this->load->view('menu_general');
       $data['mensaje'] = "No existen alumnos con los criterios de búsqueda seleccionados";
       $this->load->view('mensajes',$data);
       $this->load->view('footer');}
     else
     {
       if ($query["cronograma"]==FALSE)  {
          $this->load->view('header');
          $this->load->view('menu_general');
          $data['mensaje'] = "No existen partida de alimentos asignada con esos parámetros";
          $this->load->view('mensajes',$data);
          $this->load->view('footer');
       }
       else
       {  
          $query['asistencia']=$this->bases_model->existe_asistencia($data);
          if ($query['asistencia']!=FALSE)
          {
           $this->load->view('header');
           $this->load->view('menu_general');
           $data['mensaje'] = "Ya existe control de asistencia cargada para esa fecha y modalidad";
           $this->load->view('mensajes',$data);
           $this->load->view('footer');
          }
          else
          {
          $this->load->view('header');
          $this->load->view('menu_general');
          $this->load->view('grafica_asistencias',$query);
          $this->load->view('footer');
          }
        }
      }
   }

   public function valida_fechas_menu(){
     $this->form_validation->set_rules('fecha_inicial','fecha_inicial','required');
     $this->form_validation->set_rules('fecha_final','fecha_final','required|callback_fecha_final_check');
     $this->form_validation->set_message('required', '<div class="alert alert-danger">El campo %s es  obligatorio</div>');
     $this->load->view('header');
     if ($this->form_validation->run() == FALSE)
         {
            $this->load->view('menu_general');
         	$this->load->view('calendario_menu');
            $this->load->view('footer');
         }
        else{
        	$fecha_inicial=$this->input->post('fecha_inicial',TRUE);
            $fecha_final=$this->input->post('fecha_final',TRUE);
            if ($fecha_inicial>$fecha_final)
            {
                $this->load->view('menu_general');
            	$this->load->view('calendario_menu');
                $this->load->view('footer');
            }
            else
            {
               $data = array(
               'fecha_inicial'=> $fecha_inicial,
               'fecha_final'  => $fecha_final,
               );
               $query["menus"]=$this->bases_model->grafica_menus($data);  
               if ($query["menus"]==FALSE)    
               {$this->load->view('menu_general');
                $data['mensaje'] = "No existen menús a mostrar en este rango de fechas";
                $this->load->view('mensajes',$data);
                $this->load->view('footer');}
               else
               {
                $query["detalle_menus"]=$this->bases_model->detalle_menus($data);  
                $this->load->view('menu_general');
                $this->load->view('menus',$query);
                $this->load->view('footer');
               }	
            }
        	
        }
    }

    public function fecha_final_check()
        {
          $fecha_inicial=$this->input->post('fecha_inicial',TRUE);
          $fecha_final=$this->input->post('fecha_final',TRUE);
          $fecha = new DateTime($fecha_inicial);
          $dia1 = $fecha->format('d');
          $fecha = new DateTime($fecha_final);
          $dia2 = $fecha->format('d');
          if (($dia2-$dia1)>7)
          {
           $this->form_validation->set_message('fecha_final_check', '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La fecha final debe ser mayor que la fecha inicial (máximo 7 días) </div>');
           return FALSE;
          }
          elseif ($fecha_inicial>$fecha_final)
          {
            $this->form_validation->set_message('fecha_final_check', '<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>La fecha final debe ser mayor que la fecha inicial (máximo 7 días) </div>');
           return FALSE;
          }
          else
            return TRUE;  
        }

}