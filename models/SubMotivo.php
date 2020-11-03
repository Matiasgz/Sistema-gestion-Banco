<?php

// models/Naturaleza.php

class SubMotivo extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM submotivo");
		return $this->db->fetchAll();
	}

}