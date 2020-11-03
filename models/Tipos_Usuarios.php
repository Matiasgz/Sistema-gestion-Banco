<?php 

    // models/Usuarios.php

class Tipos_Usuarios extends Model {
	
	public function getTodos() {
		$this->db->query("SELECT * FROM tipo_usuario");
		return $this->db->fetchAll();
    }
}