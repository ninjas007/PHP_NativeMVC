<?php 

class Buku_model {

	private $table = 'tbl_buku';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllBuku()
	{
		$this->db->query("SELECT * FROM $this->table");
		return $this->db->resultSet();
	}

	public function getBukuById($id)
	{
		$this->db->query("SELECT * FROM tbl_buku WHERE id = $id");
		$this->db->bind('id',$id);
		return $this->db->single();
	}
}
