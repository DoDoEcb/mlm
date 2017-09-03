<?php if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Common extends My_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "myhelpermodel", "omyhe" );
	}
	public function Menubar() {
		$menus = array (
				'items' => array (),
				'parents' => array () 
		);
		 
		$result = $this->omyhe->GetMenubar();
		foreach ( $result as $row ) {
			$menus ['items'] [$row ['id']] = $row;
			$menus ['parents'] [$row ['parent']] [] = $row ['id'];
		}
		 
		$Menu=self:: createTreeView(NULL, $menus);
		echo json_encode(array("bar" => $Menu));
		//$this->load->view("Common/Menubar",["Menu"=> $Menu]);
	}
	
	
	private function createTreeView($parent, $menu) {
		$html = "";
		if (isset($menu['parents'][$parent])) {
			$html .= "";
			foreach ($menu['parents'][$parent] as $itemId) {
				if (!isset($menu['parents'][$itemId])) {
					$html .= "<li > <a href='" .base_url($menu['items'][$itemId]['link']) . "/'> <i class='fa fa-angle-double-right'></i>   " . $menu['items'][$itemId]['label'] . "  </a> </li>";
				}
				if (isset($menu['parents'][$itemId])) {
					$html .= "  <li class='treeview'> <a href='#'>  <i class='fa fa-folder'></i> <span>" . $menu['items'][$itemId]['label'] . "</span>  <i class='fa fa-angle-left pull-right'></i></a> <ul class=\"treeview-menu\">";
					$html .=self:: createTreeView($itemId, $menu);
					$html .= "</ul></li>  ";
				}
			}
			$html .= "";
		}
		return $html;
	}
	
}
