<?php 
	class adduser extends core {

		function getTitle() {
			return 'Добавить пользователя';
		}
		
		function getContent() {
			
			if(isset($_POST['add-user'])) {
				$first_name = trim(htmlspecialchars(stripcslashes($_POST['first_name'])));
				$second_name = trim(htmlspecialchars(stripcslashes($_POST['second_name'])));
				$email = trim(htmlspecialchars(stripcslashes($_POST['email'])));
				
				if(!empty($email)) {
					if(preg_match("/^([\w\d\-\_\.]+)\@([\w\d\-\_\.]+)\.([\w\d]{2,4})$/", $email)) {
						$this->c->add_user($first_name, $second_name, $email);
						header("Location: ?option=indexclass");
					} else {
						$result = "<p>Невено указана почта</p>";
					}
				} else {
					$result = "<p>Заполните поле почты</p>";
				}
			}
			$object = new addcontent();
			$result .= $object->add_vozvrat();
			return $result;
		}	
	}
?>
