<?php 
class editcontent {
	public $r;
	
	public function __construct($r) {
		$this->r = $r;
	}
	
	function vozvratedit() {
		$row = $this->r->fetch_assoc();
			
		$first_name = $row['first_name'];
		$second_name = $row['second_name'];
		$email = $row['email'];
	
		$result = "
			<form method='post'>
				<p class='input-group'><span>Имя</span><input type='text' size='19' value='$first_name' class='form-control'  aria-describedby='basic-addon1' name='first_name' /></p>
					
				<p class='input-group'><span>Фамилия</span><input type='text' size='15' value='$second_name' class='form-control' aria-describedby='basic-addon1' name='second_name' /></p>
					
				<p class='input-group'><span>E-mail:</span><input type='text' size='17' value='$email' class='form-control' aria-describedby='basic-addon1' name='email' /></p>
					
				<p><input class='btn btn-primary' type='submit' name='edit-user' value='Редактировать' /></p>
			</form>
			";
		$result .= "<a href='?option=index' style='color: #337AB7;'>На главную</a>";
		return "$result";
	}
}
?>
