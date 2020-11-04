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
        if(!is_int($doc)) die("error documento no numeric");
        if($doc <= 0) die ("error documento negativo");
        if(strlen(strval($doc)) != 8) die("error cantidad de numero doc");

        //busco
        $this->db->query("SELECT id_cliente FROM  clientes  WHERE  DNI = $doc ");
        $aux=$this->db->fetch();

        return $aux;

    }


    public function CrearCliente($nomApe, $doc, $mail, $tel){
        //hago las validacion
        $doc=$this->db->escapeWildcards($doc);
        if(!is_int($doc)) die("error documento no entero");
        if($doc <= 0) die ("error documento negativo");
        if(sizeof($doc) != 8) die("error cantidad de numero doc");

        $nomApe=$this->db->escapeWildcards($nomApe);
        if(!is_string($nomApe)) die("error nombre no string");

        $mail=$this->db->escapeWildcards($mail);
        $mail = filter_var( $mail, FILTER_SANITIZE_STRING);
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)== false) die("error mail no valido");


        $tel=$this->db->escapeWildcards($tel);
        if ( (strlen($tel) != 8 )  || (strlen($tel) != 10 ) ) die("error cantidad de numero telefono");
        if(!is_int($tel)) die("error telefono no numerico");
                

        //hago el insert

        $this->db->query("INSERT INTO clientes (nombre_apellido,DNI,mail,tel)
        VALUES ('$nomApe' ,$doc, '$mail' , $tel)");

        
    }

}
    
    ?>