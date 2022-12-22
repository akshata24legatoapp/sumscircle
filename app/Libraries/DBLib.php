<?php 
    namespace App\Libraries;
    
class DBLib{
	function __construct(){
		// Call the Model constructor
		$this->db = \Config\Database::connect();
	}


	public function getuser_rights($menu_id,$submenu_id){
 		$role_id = $_SESSION['role_id'];
 		$query = $this->db->query("SELECT * FROM role_rights_t where role_id = '$role_id' AND menu_id = '$menu_id' AND submemu_id = '$submenu_id'");
		$res= $query->getRowArray();
		return $res;
 	}
}


?>