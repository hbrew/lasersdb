<?php

class UserError {
	private $message = "";
	private $priority = 0;

	public function __construct($message, $priority = 0) {
		$this->message = $message;
		$this->priority = $priority;
		$this->handle();
	}

	private function handle() {
		if ($this->priority == 1) {
			exit($this->message);
		}
	}

	public function getMessage() {
		return $this->message;
	}

	public static function format() {
		$output = '';
		foreach($GLOBALS['errors'] as $key => $error) {
			$output .= $error->getMessage() . "\n";
		}
		return $output;
	}

}

?>