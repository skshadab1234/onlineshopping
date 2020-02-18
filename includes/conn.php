<?php

class Database
{

	private $server = "pgsql:host=ec2-46-137-177-160.eu-west-1.compute.amazonaws.com;port=5432;dbname=d905fbous6e6gr";
	private $username = "jwudrsfkfrpmvh";
	private $password = "e3e08fd3b4c54f9b0c82eeca7b051d631d90bd31d972bea4d6ea405b77ddda9f";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;

	public function open()
	{
		try {
			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
			return $this->conn;
		} catch (PDOException $e) {
			echo "There is some problem in connection: " . $e->getMessage();
		}
	}

	public function close()
	{
		$this->conn = null;
	}
}

$pdo = new Database();
