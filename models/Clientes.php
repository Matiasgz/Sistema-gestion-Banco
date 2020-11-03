<?php

// models/Casos.php

class Clientes extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM casos");
		return $this->db->fetchAll();
    }



    public function getID($doc){
        //valido




        //busco
        $this->db->query("SELECT id_cliente FROM  clientes  WHERE  DNI = $doc ");
        $aux=$this->db->fetch();

        return $aux;

    }


    public function CrearCliente($nomApe, $doc, $mail, $tel){
        //hago las validacion



        

        //hago el insert

        $this->db->query("INSERT INTO clientes (nombre_apellido,DNI,mail,tel)
        VALUES ('$nomApe' ,$doc, '$mail' , $tel)");

        
    }

}
    
    ?>