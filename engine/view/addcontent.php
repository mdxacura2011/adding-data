<?php 
class addcontent {

	public function add_vozvrat() {
		$result = "
				<form method='post'>
					<p class='input-group'><span>Имя</span><input type='text' size='19' class='form-control'  aria-describedby='basic-addon1' name='first_name' /></p>
					
					<p class='input-group'><span>Фамилия</span><input type='text' size='15'  class='form-control' aria-describedby='basic-addon1' name='second_name' /></p>
					
					<p class='input-group'><span>E-mail:</span><input type='text' size='17'  class='form-control' aria-describedby='basic-addon1' name='email' /></p>
					
					<p><input class='btn btn-primary' type='submit' name='add-user' value='Добавить' /></p>
				</form>
			";
		$result .= "<a href='?option=index' style='color: #337AB7;'>На главную</a>";
		return "$result";
	}
}
