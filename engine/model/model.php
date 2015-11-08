<?php 
class model {
	protected $db;
	const HOST = 'localhost';
	const USER = 'u831078894_rewo';
	const PASSWORD = 'vfibyfvjz777';
	const BASE = 'u831078894_rewo';
	
	
	public function __construct() {
		$ob_mysqli = @new mysqli(self::HOST, self::USER, self::PASSWORD, self::BASE);
		if (!$ob_mysqli->connect_error) {
			$this->db=$ob_mysqli;
			$this->db->query("SET NAMES `utf8`");
		} else {
			exit('No connect to server');
		}
	}
		
	public function main_page() {
		$r = $this->db->query("SELECT * FROM `users`");
		return $r;
	}
	
	public function id_number($id) {
		$mDel = $this->db->query("DELETE FROM `users` WHERE `id` = '".$id."'");
		return $mDel;
	}
	
	public function add_user($first_name, $second_name, $email) {
		$mDel = $this->db->query("
							INSERT INTO users
							(first_name, second_name, email)
							VALUES
							('$first_name', '$second_name', '$email')
						");
		return $mDel;
	}
	
	public function edit_user($first_name, $second_name, $email, $rtr) {
		$mDel = $this->db->query("
						UPDATE `users` SET
						`first_name`='$first_name',
						`second_name`='$second_name',
						`email`='$email' 
						WHERE `id`='$rtr'
						");
		return $mDel;
	}
	
	public function data_user($rtr) {
		$mDel = $this->db->query(
			"
			SELECT 
			`first_name`, `second_name`, `email`
			FROM users
			WHERE id = '$rtr'
			"
			);
		return $mDel;
	}
}
?>