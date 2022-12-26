<?php 

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\DBLib;

class AdminModel extends Model{
      
   	public function __construct(){
		parent::__construct();
		$db = \Config\Database::connect();
		$this->lib = new DBLib();
	}

	public function getAllMenu_list(){
		$query = $this->db->query("SELECT * FROM menu_t ORDER BY menu_prior ASC");
		$res= $query->getResultArray();
		return $res;
	}

	public function getSubmenusByMenuid($menu_id){
		$query = $this->db->query("SELECT * FROM submenus_t where menu_id = '$menu_id'");
		$res= $query->getResultArray();
		return $res;
	}

	public function save_role($data){
		extract($data);
		
		$susername = $_SESSION['username'];
		//$role_id = $_SESSION['role_id'];
		$current_datetime = date('Y-m-d H:i:s');

		if(!empty($data['role_id'])){

			$update = array(
				'role_name' 	=> $data['role_name'],
				'role_status' 	=> $data['role_status'],
				'updated_by' 	=> $susername,
				'updated_date' 	=> $current_datetime
			);

			$query = $this->db->table('roles_t');
			$query->where('id',$data['role_id']);
	        $res = $query->update($update);

	        $status = [
                'success' => 'success',
                'message' => 'Updated Successfully',
            ];

	        if($res){
	        	$sql="delete from role_rights_t where role_id='".$data['role_id']."'";
				$result = $this->db->query($sql);
				$addRight = '';
				$editRight = '';
				$deleteRight = '';
				$viewRight = '';


				foreach($menu as $key => $val){

					$submenuobj = $data['submenu_'.$val];

					foreach($submenuobj as $key1 => $value1){

						
						if(isset($data['add_'.$val.'_'.$value1]) && 
							($data['add_'.$val.'_'.$value1] !='')){
							$addRight = $data['add_'.$val.'_'.$value1];
						}else{
							$addRight = 0;
						}

						if(isset($data['edit_'.$val.'_'.$value1]) && 
							($data['edit_'.$val.'_'.$value1] !='')){
							$editRight = $data['edit_'.$val.'_'.$value1];
						}else{
							$editRight = 0;
						}

						if(isset($data['delete_'.$val.'_'.$value1]) && 
							($data['delete_'.$val.'_'.$value1] !='')){
							$deleteRight = $data['delete_'.$val.'_'.$value1];
						}else{
							$deleteRight = 0;
						}

						if(isset($data['view_'.$val.'_'.$value1]) && 
							($data['view_'.$val.'_'.$value1] !='')){
							$viewRight = $data['view_'.$val.'_'.$value1];
						}else{
							$viewRight = 0;
						}

						$rights = array(
							
							'role_id' 		=> $data['role_id'],
							'menu_id' 		=> $val,
							'submemu_id' 	=> $value1,
							'add_right' 	=> $addRight,
							'edit_right'	=> $editRight,
							'delete_right'	=> $deleteRight,
							'view_right' 	=> $viewRight
						);
						
						$query = $this->db->table('role_rights_t');
		        		$res = $query->insert($rights);
					
					}
				}
	        }

		}else{

			$insert = array(
				'role_name' 	=> $data['role_name'],
				'role_status' 	=> $data['role_status'],
				'created_by' 	=> $susername,
				'created_date' 	=> $current_datetime
			);
		
			$query = $this->db->table('roles_t');
	        $res = $query->insert($insert);
	        $insertid = $this->db->insertID();

	        $status = [
                'success' => 'success',
                'message' => 'Added Successfully',
            ];
        
	        if($insertid){

	        	$sql="delete from role_rights_t where role_id='".$insertid."'";
				$result = $this->db->query($sql);
				$addRight = '';
				$editRight = '';
				$deleteRight = '';
				$viewRight = '';


				foreach($menu as $key => $val){

					$submenuobj = $data['submenu_'.$val];

					foreach($submenuobj as $key1 => $value1){

						
						if(isset($data['add_'.$val.'_'.$value1]) && 
							($data['add_'.$val.'_'.$value1] !='')){
							$addRight = $data['add_'.$val.'_'.$value1];
						}else{
							$addRight = 0;
						}

						if(isset($data['edit_'.$val.'_'.$value1]) && 
							($data['edit_'.$val.'_'.$value1] !='')){
							$editRight = $data['edit_'.$val.'_'.$value1];
						}else{
							$editRight = 0;
						}

						if(isset($data['delete_'.$val.'_'.$value1]) && 
							($data['delete_'.$val.'_'.$value1] !='')){
							$deleteRight = $data['delete_'.$val.'_'.$value1];
						}else{
							$deleteRight = 0;
						}

						if(isset($data['view_'.$val.'_'.$value1]) && 
							($data['view_'.$val.'_'.$value1] !='')){
							$viewRight = $data['view_'.$val.'_'.$value1];
						}else{
							$viewRight = 0;
						}

						$rights = array(
							
							'role_id' 		=> $insertid,
							'menu_id' 		=> $val,
							'submemu_id' 	=> $value1,
							'add_right' 	=> $addRight,
							'edit_right'	=> $editRight,
							'delete_right'	=> $deleteRight,
							'view_right' 	=> $viewRight
						);
						
						$query = $this->db->table('role_rights_t');
		        		$res = $query->insert($rights);
						
					}
				}
	        }
		}

		return $status;
		
	}

	public function getRoleById($role_id){
		//$query = $this->db->query("SELECT * FROM roles_t WHERE id = '$role_id'");
		//$res= $query->getRowArray();

		$query = "SELECT * FROM roles_t WHERE id = '$role_id'";
		$res= $this->lib->getRow($query);
		return $res;
	}

	public function getAllRoles(){
		//$query = $this->db->query("SELECT * FROM roles_t WHERE deleted_date IS NULL");
		//$res= $query->getResultArray();
		
		$query = "SELECT * FROM roles_t WHERE deleted_date IS NULL";
		$res= $this->lib->getAllResult($query);
		return $res;
	}

	public function getAllMenuByRoleId($role_id){
		if(!empty($role_id)){
			$query = $this->db->query("SELECT * FROM menu_t LEFT JOIN (SELECT menu_id as rr_mid from role_rights_t where role_id='$role_id') as T2 ON menu_t.id=T2.rr_mid GROUP BY menu_t.id ORDER BY menu_t.menu_prior ASC");
		}else{
			$query = $this->db->query("SELECT * FROM menu_t ORDER BY menu_prior ASC");
		}
		$res= $query->getResultArray();
		return $res;
	}

	public function getSubmenusByRoleId($menu_id,$role_id){
		if(!empty($role_id)){
			$query = $this->db->query("SELECT * FROM submenus_t LEFT JOIN (SELECT submemu_id as rr_sid,add_right,edit_right,delete_right,view_right from role_rights_t where role_id='$role_id') as T2 ON submenus_t.id=T2.rr_sid WHERE
				submenus_t.menu_id='$menu_id' GROUP BY submenus_t.id  ORDER BY submenus_t.submenu_prior ASC");
		}else{
			$query = $this->db->query("SELECT * FROM submenus_t where menu_id = '$menu_id' ORDER BY submenu_prior ASC");
		}
		
		$res= $query->getResultArray();
		return $res;
	}

	public function deleteRole($role_id){

		$susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');

		$del = array(
			'deleted_by' 	=>	$susername,
			'deleted_date' 	=> 	$current_datetime
		);

		$query = $this->db->table('roles_t');
		$query->where('id',$role_id);
        $res = $query->update($del);
       
        if($res){
    
        	$roleId = implode(" ",$role_id);
        	$sql=$this->db->query("DELETE FROM role_rights_t WHERE role_id='$roleId'");
			
 			$status = array(
 				'status' 	=> 'success',
				'response' 	=> 'Role Deleted successfully'
 			);
			
 		}else{
 			$status = array(
 				'status' 	=> 'fail',
				'response' 	=> 'failed'
 			);
 		}
		return $status;
	}

	public function getAllUser_list(){
		$query = $this->db->query("SELECT * FROM users_t WHERE deleted_date IS NULL");
		$res= $query->getResultArray();
		return $res;
	}

	public function save_users($data,$img=''){
		
		$susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');
		
		if(!empty($data['user_id'])){

			if($data['attat_file'] != '' && ($img->getName() == '')){

				$filename=  $data['attat_file'];

			}else if($data['attat_file'] != '' && ($img->getName() != '')){
				if(! $img->hasMoved()) {
					$img->move(ROOTPATH . 'public/assets/images/users', $img->getName());
		            $filename=  $img->getName();
				}else {
					$filename= '';
				}
			}else if($data['attat_file'] == '' && ($img->getName() != '')){
				if(! $img->hasMoved()) {
					$img->move(ROOTPATH . 'public/assets/images/users', $img->getName());
		            $filename=  $img->getName();
				}else {
					$filename= '';
				}
			}else{
				$filename= '';
			}

			$update = array(
				'role_id' 		=> $data['role_id'],
				'user_name' 	=> $data['user_name'],
				'user_email' 	=> $data['user_email'],
				'user_mobile' 	=> $data['user_mobile'],
				'user_status' 	=> $data['user_status'],
				'user_image' 	=> $filename,
				'updated_by' 	=> $susername,
				'updated_date'  => $current_datetime,
				
			);
			
			$query = $this->db->table('users_t');
			$query->where('id',$data['user_id']);
	        $res = $query->update($update);
	       
		}else{

			if(!empty($img)){
				if(! $img->hasMoved()) {
					//sumscircle/public/assets/images/users

		            //$filepath = WRITEPATH . 'uploads/users/' . $img->getName();
		            //$img->move(WRITEPATH . 'uploads/users/');
		            
		            $img->move(ROOTPATH . 'public/assets/images/users', $img->getName());
		            //$img->move(APPPATH2 . 'images/users', $img->getName());
		           
		            $filename=  $img->getName();
		            //$type =  $img->getClientMimeType();
	        	}
			}else{
				$filename= '';
			}
		
      
			$insert = array(
				'role_id' 		=> $data['role_id'],
				'password' 		=> md5($data['Password']),
				'user_name' 	=> $data['user_name'],
				'user_email' 	=> $data['user_email'],
				'user_mobile' 	=> $data['user_mobile'],
				'user_status' 	=> $data['user_status'],
				'user_image' 	=> $filename,
				'created_by' 	=> $susername,
				'created_date'  => $current_datetime,
				
			);
			
			$query = $this->db->table('users_t');
	        $res = $query->insert($insert);
	        $insertid = $this->db->insertID();

		}
		 
	}

	public function getRoles(){
		$query = $this->db->query("SELECT * FROM roles_t WHERE role_status = '1' AND deleted_date IS NULL");
		$res= $query->getResultArray();
		return $res;
	}

	public function getUserById($userid){
		$query = $this->db->query("SELECT * FROM users_t WHERE id = '$userid'");
		$res= $query->getRowArray();
		return $res;
	}

	public function getMenuuser_rights($user_id){
		//$sql = "SELECT * FROM menu_t LEFT JOIN (select menu_id as r_mid from role_rights_t LEFT JOIN users_t u ON u.role_id = role_rights_t.role_id where u.id = '10' ) as T2 on menu_t.id=T2.r_mid GROUP BY menu_t.menu_name";

		$sql = $this->db->query("SELECT menu_id as r_mid,m.menu_name 
								FROM role_rights_t
								LEFT JOIN users_t u ON u.role_id = role_rights_t.role_id
								LEFT JOIN menu_t m ON role_rights_t.menu_id = m.id 
								WHERE u.id = '$user_id' 
								GROUP BY m.id 
								ORDER BY M.ID ASC");
			$res= $sql->getResultArray();
			return $res;
	}

	public function getSubmenuuser_rights($user_id,$menu_id){
		$sql = $this->db->query("SELECT role_rights_t.*,sm.submenu_name 
								FROM role_rights_t 
								LEFT JOIN users_t u ON u.role_id = role_rights_t.role_id 
								LEFT JOIN submenus_t sm ON role_rights_t.submemu_id = sm.id 
								WHERE u.id = '$user_id' AND sm.menu_id = '$menu_id' 
								ORDER BY sm.submenu_prior ASC");
			$res= $sql->getResultArray();
			return $res;
	}

	public function getuser_rights($user_id){

			$sql = $this->db->query("SELECT role_rights_t.*,u.user_name,menu_t.menu_name,submenus_t.submenu_name 
					FROM users_t u
					LEFT JOIN role_rights_t ON u.role_id = role_rights_t.role_id
					LEFT JOIN menu_t ON role_rights_t.menu_id = menu_t.id
					LEFT JOIN submenus_t ON role_rights_t.submemu_id =submenus_t.id
					where u.id = '$user_id'
					
					ORDER BY role_rights_t.id ASC
					");
			$res= $sql->getResultArray();
			return $res;
	}

	public function deleteUser($user_id){

		$susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');

		$del = array(
			'deleted_by' 	=>	$susername,
			'deleted_date' 	=> 	$current_datetime
		);

		$query = $this->db->table('users_t');
		$query->where('id',$user_id);
        $res = $query->update($del);
       
        if($res){
   	
 			$status = array(
 				'status' 	=> 'success',
				'response' 	=> 'User Deleted successfully'
 			);
 		}else{
 			$status = array(
 				'status' 	=> 'fail',
				'response' 	=> 'failed'
 			);
 		}
		return $status;
	}


}
?>