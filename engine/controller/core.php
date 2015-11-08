<?php 
abstract class core {
	public $_tamplate = 'defaultTemp';
	protected $c;
	
	public function __construct() {
		$this->c = new model();
	}
	
	private function replaceStringContent($tmp_content) {
		return str_replace('%table%', $this->getContent(), $tmp_content);
	}
	
	private function replaceStringTitle($tmp_title) {
		return str_replace('%title%', $this->getTitle(), $tmp_title);
	}
	
	private function replaceStringRoot($tmp_title) {
			$tmp_name = $this->_tamplate;
			$root = '/engine/templates/'.$tmp_name;
			return str_replace('%root%', $root, $tmp_title);
	}
	
	public function getBody() {
		$tmp_name = $this->_tamplate;
		$tmp_url = ROOT.'/engine/templates/'.$tmp_name.'/main.php';
		if(file_exists($tmp_url)) {
			$tmp = file_get_contents($tmp_url);
			$tmp = $this->replaceStringRoot($tmp);
			$tmp = $this->replaceStringContent($tmp);
			$tmp = $this->replaceStringTitle($tmp);
			echo $tmp;	
		}
		else {
			throw new Exception('Шаблон не подключен!');
		}
	}
	
	abstract function getContent();
	abstract function getTitle();
}
?>
