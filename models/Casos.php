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
        //hago las valideishon



        //busco
        $this->db->query("SELECT * FROM  casos AS ca, clientes as cli WHERE cli.DNI LIKE '{$palabra}%' and cli.id_cliente = ca.id_cliente");
        $aux=$this->db->fetchAll();

        return $aux;

    }

    public function CrearCaso($descripcion,$estado,$id_submot,$id_cliente,$id_usuario){

        //valido las variables 


        //hago el insert
        $this->db->query(" INSERT INTO casos (fecha,descripcion,estado,id_submotivo,id_cliente,id_usuario)
        VALUES (NOW(),'$descripcion' ,$estado, $id_submot , $id_cliente , $id_usuario )");
        
    }

   
}