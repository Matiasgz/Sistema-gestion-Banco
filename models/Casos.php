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

    public function BuscarCaso($palabra){
        //valido
        $palabra=$this->db->escapeWildcards($palabra);
        
        //ORDER BY STR_TO_DATE(datestring, '%d/%m/%Y')
        $this->db->query("SELECT  ca.descripcion, ca.fecha, ca.estado, cli.nombre_apellido, cli.DNI FROM  casos AS ca, clientes as cli WHERE cli.DNI LIKE '{$palabra}%' and cli.id_cliente = ca.id_cliente ");
        $aux=$this->db->fetchAll();
        //DATE_FORMAT('2009-10-04 22:23:00', '%W %M %Y')
        //DATE_FORMAT(ca.fecha,'%d/%m/%Y')
        //DATE_FORMAT(ca.fecha, "%d/%l/%Y %H:%i:%s")
        //ORDER BY STR_TO_DATE(datestring, '%d/%m/%Y')
        return $aux;

    }

    public function CrearCaso($descripcion,$estado,$id_submot,$id_cliente,$id_usuario){

        //valido
        $descripcion=$this->db->escapeWildcards($descripcion);
        $descripcion=$this->db->escape($descripcion);
        
        if(!is_int($id_submot)) die("error submotivo");
        if($id_submot <= 0) die ("error index submotivo negativo");
        
        //hago el insert
        $this->db->query(" INSERT INTO casos (fecha,descripcion,estado,id_submotivo,id_cliente,id_usuario)
        VALUES (NOW(),'$descripcion' ,$estado, $id_submot , $id_cliente , $id_usuario )");
        
    }

    public function ResolucionPendiente($resolucion,$id_caso){
        //valido
        $resolucion=$this->db->escapeWildcards($resolucion);
        $resolucion=$this->db->escape($resolucion);

        //hago el update
        $this->db->query("UPDATE casos
                          SET resolucion = '$resolucion',
                          estado = '1'
                          WHERE id_caso=$id_caso");


    }

   
}