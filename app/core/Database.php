<?php 

class Database {

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $statement;

	public function __construct()
	{
		// data source name
		$dsn = "mysql:host=$this->host;dbname=$this->db_name";

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass); // option digunakan untuk optimasi ke database
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function query($query)
	{
		$this->statement = $this->dbh->prepare($query);
		return $this->statement;
	}

	public function bind($param, $val, $type = null)
	{
		if ( is_null($type) ) {
			switch (true) {
				case is_int($value) : 
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}

		$this->statement->bindValue($param, $value, $type);
	}

	public function execute()
	{
		return $this->statement->execute();
	}

	// function untuk mengambil banyak data
	public function resultSet()
	{
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}

	// menambil satu data aja
	public function single()
	{
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_ASSOC);
	}


}