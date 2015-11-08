<?php 
class content {
	public $r;
	
	public function __construct($r) {
		$this->r = $r;
	}
	
	public function vozvrat() {
		$rows = $this->r->fetch_assoc();
		$sOut = "
			<tr>
				<th>Имя</th>
				<th>Фамилия</th>
				<th>Почта</th>
				<th>Правка/Удалить</th>
			</tr>\n";
		do{
			$sOut .= "\t<tr>\n";
			
			foreach ($rows as $col_value) {
				if($col_value > 0) continue;
				$sOut .= "\t\t<td>".$col_value."</td>\n";
			}
			$sOut .= "
			   <td><a href=\"?option=edit&id=".$rows['id']."\"> Правка </a> /
			    <a href='#' onclick=\"del(".$rows['id'].")\"> Удалить </a></td>
			   \t</tr>\n
			   ";
			}
		while($rows = $this->r->fetch_assoc());
			$sOut .= "\n";
			$sOut .= "
			   ﻿<div class='col-sm-12' style='padding: 15px;'>
					<button type='button' onclick=location.href='?option=adduser' class='btn btn-primary'>Добавить новую запись</button>
				</div>
			";
	return $sOut;
	}
}
?>