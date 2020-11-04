<?php 

    // models/Usuarios.php

class Usuarios extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT u.id_usuario, u.nombreusuario, u.contraseña, u.nombre, t.tipo 
						  FROM usuarios as u 
						  LEFT JOIN tipo_usuario as t on 
						  u.id_tipo=t.id_tipo");
		return $this->db->fetchAll();
	}

	public function ValidarUsuario($nombre, $contra){
		$aux=$this->getTodos();
	
		// ver validacion de datos
		// comillas
		$nombre=$this->db->escape($nombre);
		$contra=$this->db->escape($contra);
		// comodines
		$nombre=$this->db->escapeWildcards($nombre);
		$contra=$this->db->escapeWildcards($contra);
		// hashing
		$contra=$this->AplicarHashing($contra);
		//var_dump($contra);

		foreach($aux as $a){
			if($a['nombreusuario']==$nombre && $a['contraseña']==$contra)
			{
				return $a['tipo'];
			}
		}
		return false;
	}

	public function AplicarHashing($str){
		
		$str=sha1($str);
		
		return $str;
	}

	public function GetID($nombre, $contra){

			$aux=$this->getTodos();
		
			// ver validacion de datos
			// comillas
			$nombre=$this->db->escape($nombre);
			$contra=$this->db->escape($contra);
			// comodines
			$nombre=$this->db->escapeWildcards($nombre);
			$contra=$this->db->escapeWildcards($contra);
			// hashing
			$contra=$this->AplicarHashing($contra);
			//var_dump($contra);
	
			foreach($aux as $a){
				if($a['nombreusuario']==$nombre && $a['contraseña']==$contra)
				{
					return $a['id_usuario'];
				}
			}
			return false;
		}
		
	}



