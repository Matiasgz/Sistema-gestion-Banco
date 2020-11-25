<?php

// models/Casos.php

class Clientes extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM casos");
		return $this->db->fetchAll();
    }



    public function getID($doc){
        //valido
        //$doc=$this->db->escapeWildcards($doc);
        if(!($this->db->digit($doc))) throw new ValidacionExceptionClientes ('error digit doc');
        if($doc <= 0) throw new ValidacionExceptionClientes ('error documento negativo');
        if(strlen(strval($doc)) > 8) throw new ValidacionExceptionClientes ("error cantidad de numero doc");

        //busco
        $this->db->query("SELECT id_cliente FROM  clientes  WHERE  DNI = $doc ");
        $aux=$this->db->fetch();

        return $aux;

    }


    public function CrearCliente($nomApe, $doc, $mail, $tel){
        //hago las validacion
        //nomape
        $nomApe=$this->db->escape($nomApe);
        $nomApe=$this->db->escapeWildcards($nomApe);
        if(!is_string($nomApe)) throw new ValidacionExceptionClientes ("error nombre no string");

        //mail
        $mail=$this->db->escape($mail);
        $mail=$this->db->escapeWildcards($mail);
        $mail = filter_var( $mail, FILTER_SANITIZE_STRING);
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)== false) throw new ValidacionExceptionClientes ("error mail no valido");

        //tel
        if(!($this->db->digit($doc))) throw new ValidacionExceptionClientes ('error digit tel');
        if ( (strlen($tel) > 15 )  || (strlen($tel) < 10 ) ) throw new ValidacionExceptionClientes ("error cantidad de numero telefono");
                

        //hago el insert

        $this->db->query("INSERT INTO clientes (nombre_apellido,DNI,mail,tel)
        VALUES ('$nomApe' ,$doc, '$mail' , $tel)");

        
    }

}
    
class ValidacionExceptionClientes extends Exception{}

    ?>