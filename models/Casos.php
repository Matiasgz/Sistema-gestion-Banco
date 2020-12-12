<?php

// models/Casos.php

class Casos extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM casos");
		return $this->db->fetchAll();
	}

	public function CasosPendientes(){
       
        $this->db->query("SELECT *  
                          FROM casos as c 
                          LEFT JOIN submotivo as s on 
                          c.id_submotivo=s.id_submotivo
                          LEFT JOIN motivo as m ON
                          s.id_motivo=m.id_motivo
                          LEFT JOIN naturaleza as n ON
                          n.id_naturaleza=m.id_naturaleza
                          LEFT JOIN clientes as cli on
                          c.id_cliente=cli.id_cliente");
        $aux=$this->db->fetchAll();

        $pendientes=array();
         
        foreach($aux as $a){
            if($a['estado']==0){
                $pendientes[]=$a;
            }
        }
        return $pendientes;
    }

    public function TodosLosCasos(){
        $this->db->query("SELECT *  
                        FROM casos as c 
                        LEFT JOIN submotivo as s on 
                        c.id_submotivo=s.id_submotivo
                        LEFT JOIN clientes as cli on
                        c.id_cliente=cli.id_cliente");
        $aux=$this->db->fetchAll();

        return $aux;

    }

    public function BuscarCaso($doc){
        //valido
        if(!($this->db->digit($doc))) throw new ValidacionExceptionCasos ('error digit doc');
        if($doc <= 0) throw new ValidacionExceptionCasos ('error documento negativo');
        if(strlen(strval($doc)) > 8) throw new ValidacionExceptionCasos ("error cantidad de numero doc");
        $doc=$this->db->escape($doc);
        $doc=$this->db->escapeWildcards($doc);
       


        $this->db->query("SELECT  ca.descripcion, DATE_FORMAT(ca.fecha, '%d/%m/%Y') as fecha, ca.estado, cli.nombre_apellido, cli.DNI FROM  casos AS ca, clientes as cli WHERE cli.DNI LIKE '{$doc}%' and cli.id_cliente = ca.id_cliente ");
        $aux=$this->db->fetchAll();
       
        return $aux;

    }

    public function CrearCaso($descripcion,$estado,$id_submot,$id_cliente,$id_usuario){

        //valido
        //Descripcion        
        
        if(strlen($descripcion) < 1 ) throw new ValidacionExceptionCasos ('error no hay caracteres'); 
        $descripcion = substr($descripcion,0,50);
        $descripcion=$this->db->escape($descripcion);

        //estado
       // if(!is_numeric($estado)) throw new ValidacionExceptionCasos ('error tipo de estado');
        if($estado<0 || $estado>1) throw new ValidacionExceptionCasos ('error numero estado');

        //id_submot
        if(!($this->db->digit($id_submot))) throw new ValidacionExceptionCasos('Error digit submotivo');
        if($id_submot < 0) throw new ValidacionExceptionCasos('Error  submotivo negativo');
        $aux = $this->db->query("SELECT * FROM submotivo where id_submotivo = $id_submot LIMIT 1");
        $cont = $this->db->numRows();
        if($cont != 1)throw new ValidacionExceptionCasos('Error submotivo inexistente');
        
        //id
        if(!($this->db->digit($id_cliente))) throw new ValidacionExceptionCasos('Error digit id');
        
        //hago el insert
        $this->db->query(" INSERT INTO casos (fecha,descripcion,estado,id_submotivo,id_cliente,id_usuario)
        VALUES (NOW(),'$descripcion' ,$estado, $id_submot , $id_cliente , $id_usuario )");
        
    }

    public function ResolucionPendiente($resolucion,$id_caso){
        //valido
        //resolucion
  
        if(strlen($resolucion) < 1 ) throw new ValidacionExceptionCasos ('error no hay caracteres'); 
        $resolucion = substr($resolucion,0,50);
        $resolucion=$this->db->escape($resolucion);

        
        //id_caso
        if(!($this->db->digit($id_caso))) throw new ValidacionExceptionCasos('Error digit id_caso');

        //hago el update
        $this->db->query("UPDATE casos
                          SET resolucion = '$resolucion',
                          estado = '1'
                          WHERE id_caso=$id_caso");


    }

    
   
}

class ValidacionExceptionCasos extends Exception{}