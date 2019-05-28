<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bases_model extends CI_Model {
    function __construct()
    {
     parent::__construct();
    }

public function inserta_asistencias($data)
{
 $cadena="insert into control_asistencia(comentario,nivel,menu_id_c,nino_CURP) values('".$data["COMENTARIO"]."','".$data["NIVEL"]."',".$data["PARTIDA"].",'".$data["CURP"]."');";
  $this->db->query($cadena);
}
public function eliminarAlimento($data)
{
 $cadena="delete from detalle_cronograma where id_detalle=".$data["id_detalle"].";";
       $this->db->query($cadena);
}

public function existe_cronograma($data)
{
  $cadena="select * from  cronograma_menu WHERE fecha='".$data["fecha_inicial"]."' and modalidad='".$data["modalidad"]."';";
  $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
}

public function existe_asistencia($data)
{
  $cadena="select cm.id_c from  cronograma_menu as cm inner join control_asistencia as ca on cm.id_c=ca.menu_id_c WHERE cm.fecha='".$data["fecha_inicial"]."' and modalidad='".$data["modalidad"]."';";
  $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
}


public function grafica_asistencias($data)
{
  $cadena="SELECT P.CURP,P.NOMBRE,P.PATERNO,P.MATERNO,P.FOTO,N.GRUPO,N.GRADO
           FROM PERSONA AS P INNER JOIN NINO AS N ON P.CURP=N.CURP WHERE GRUPO='".$data["grupo"]."' and grado='".$data["grado"]."';";
  $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
}

public function grafica_menus($data)
    {
       $cadena="select d.id_c,d.id_detalle,modalidad,c.fecha,c.CURP,a.nombre_a,a.ruta from cronograma_menu as c inner join detalle_cronograma as d on c.id_c=d.id_c inner join alimentos as a on d.id_alimento=a.id_alimento where c.fecha>='".$data["fecha_inicial"]."' and c.fecha<='".$data["fecha_final"]."' order by d.id_c;";
       $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
     }

public function inserta_detalle($alimento,$lastid)
{
  $cadena="insert into detalle_cronograma(id_c,id_alimento) values(".$lastid.",".$alimento.")";
  $this->db->query($cadena);
}

public function inserta_cronograma($data)
{
  $cadena="INSERT INTO CRONOGRAMA_MENU(fecha,CURP,modalidad) values('".
  $data["fecha_inicial"]."','".$data["administrador"]."','".$data["modalidad"]."');";
  $query = $this->db->query($cadena);
        
}
public function regresa_alimento()
    {
      $cadena="select * from alimentos";
      $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
    } 



public function detalle_menus($data)
    {
       $cadena="select d.id_c,d.id_detalle,c.modalidad,count(d.id_c) as num from cronograma_menu as c inner join detalle_cronograma as d on c.id_c=d.id_c where c.fecha>='".$data["fecha_inicial"]."' and c.fecha<='".$data["fecha_final"]."' group by d.id_c order by d.id_c;";
       $query = $this->db->query($cadena);
        if ($query->num_rows() > 0)
           return $query;
        else
         return FALSE;
     }
}
