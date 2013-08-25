<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carga_m extends CI_Model {

    function __construct(){
         parent::__construct();
    }
    
    public function ingreso($data){ 	
    	
       
      	$salida=$this->db->insert('t_ingreso', $data);
        

        //echo '<pre>',print_r($cargar),'</pre>';die;
        //$this->db->insert('t_operacion', $cod_operacion);
    	return $salida;

    }

    public function egreso($data){     
        
       
        $salida=$this->db->insert('t_rubros', $data);
        //echo '<pre>',print_r($data),'</pre>';

        //echo '<pre>',print_r($cargar),'</pre>';die;
        //$this->db->insert('t_operacion', $cod_operacion);
        return $salida;

    }
    public function gastos($data){     
        
       
        $salida=$this->db->insert('t_gastos', $data);
        //echo '<pre>',print_r($data),'</pre>';

        //echo '<pre>',print_r($cargar),'</pre>';die;
        //$this->db->insert('t_operacion', $cod_operacion);
        return $salida;

    }
    public function lista_rubros(){



        $this->db->select('cod_rubros, descripcion, abreviacion');
        $this->db->from('t_rubros');
        //echo $rubros->num_rows();die;
        $rubros = $this->db->get();
        $rubros = $rubros->result_array();
        return $rubros;

        } 

    public function lista_montos(){

        $this->db->select('cod_ingreso, fecha, monto');
        $this->db->from('t_ingreso');
        //echo $montos->num_rows();die;
        $montosquery = $this->db->get();
        $montos= $montosquery->result_array();
        
            return $montos;}

   public function lista_rubros_gastos(){
    
    $this->db->select('*');
    $this->db->from('t_gastos');
    $this->db->join('t_ingreso', 't_gastos.cod_ingreso = t_ingreso.cod_ingreso');
    $this->db->join('t_rubros', 't_rubros.cod_rubros = t_gastos.cod_rubros');
    //$this->db->where('t_gastos.cod_ingreso', "2");
    $query=$this->db->get();
    $resultado=$query->result_array();
    return $resultado;
    //echo '<pre>',print_r($resultado),'</pre>';die;

   }         

    }