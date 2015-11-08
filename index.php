<?php
$dir_name = str_replace('\\', '/', dirname(__FILE__));
define('ROOT', $dir_name);

function __autoload($c) {
	switch($c) {
		case (file_exists(ROOT . '/engine/controller/'.$c.'.php')):
		require_once ROOT . '/engine/controller/'.$c.'.php';
		break;
		case (file_exists(ROOT . '/engine/model/'.$c.'.php')):
		require_once ROOT . '/engine/model/'.$c.'.php';
		break;
		case (file_exists(ROOT . '/engine/view/'.$c.'.php')):
		require_once ROOT . '/engine/view/'.$c.'.php';
		break;
	}
}
$option = 'indexclass';

if(isset($_GET['option'])) {
	$opt = $_GET['option'];
	$path = ROOT.'/engine/controller/'.$opt.'.php';
		
	if(file_exists($path)) {
		
		if(class_exists($option)) {
			$option = trim(strip_tags($_GET['option']));
			
		}
	} 
}
	$y = new $option();
	$y->getBody();
?>