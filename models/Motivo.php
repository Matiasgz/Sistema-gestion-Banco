<?php

// models/Naturaleza.php

class Motivo extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM motivo");
		return $this->db->fetchAll();
	}

}