<?php 
	class indexclass extends core {
		
		function getTitle() {
			return 'Тестовое задание';
		}
		
	function getContent() {
			
		$r = $this->c->main_page();
			
			$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
			$do = isset($_GET['option']) ? $_GET['option']      : false;
			if($do=='delete') {
				if($id) {
					$mDel = $this->c->id_number($id);
					if($mDel) {
						header("Location: ?option=indexclass");
					}
				}
			}
		$object = new content($r);
		$sOut = $object->vozvrat();
		return $sOut;
	}
}
?>
