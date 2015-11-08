<?php 
class edit extends core {

	function getTitle() {
		return 'Редактировать пользователя';
			
	}
		
	function getContent() {

		$rtr = $_GET['id'];
		if(isset($rtr)) {
		if(isset($_POST['edit-user'])) {
			
			$first_name = trim(htmlspecialchars(stripcslashes($_POST['first_name'])));
			$second_name = trim(htmlspecialchars(stripcslashes($_POST['second_name'])));
			$email = trim(htmlspecialchars(stripcslashes($_POST['email'])));
			
				if(!empty($email)) {
					if(preg_match("/^([\w\d\-\_\.]+)\@([\w\d\-\_\.]+)\.([\w\d]{2,4})$/", $email)) {
						$this->c->edit_user($first_name, $second_name, $email, $rtr);
						
						header("Location: ?option=index");
					} else {
						$result = "<p>Невено указана почта</p>";
					}
				} else {
					$result = "<p>Заполните поле почты</p>";
				}
			}
		}
			
		$res = $this->c->data_user($rtr);
		$object = new editcontent($res);
		$sOut .= $object->vozvratedit();
		return $sOut;
	}		
}
?>
