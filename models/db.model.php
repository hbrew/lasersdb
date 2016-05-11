<?php

class MySQL {
	private $host = '';
	private $username = '';
	private $password = '';
	private $database = '';
	private $mysqli;

	protected function connect() {
		$this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
		/* check connection */
		if (mysqli_connect_errno()) {
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();
		}
	}

	protected function query($q) {
		$result = $this->mysqli->query($q);
		return $result;
	}

	protected function close() {
		$this->mysqli->close();
	}

}

?>
