<?php

// models/Naturaleza.php

class Naturaleza extends Model {

	public function getTodos() {
		$this->db->query("SELECT * FROM naturaleza");
		return $this->db->fetchAll();
	}

}