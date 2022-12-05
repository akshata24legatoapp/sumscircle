<?php 

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model{
      
   	public function __construct(){
		parent::__construct();
		$db = \Config\Database::connect();
	}

	public function get_all_menus(){

		$query_menu = $this->db->query('SELECT * FROM menu_t');
		$res= $query_menu->getResultArray();
		return $res;
	}

	public function getSubmenusByMenuid($menu_id){

		$query_submenu = $this->db->query("SELECT * FROM submenus_t WHERE menu_id='$menu_id' ORDER BY submenu_prior ASC");
		$res= $query_submenu->getResultArray();
		return $res;
	
	}

	
}



?>