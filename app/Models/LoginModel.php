<?php 

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{
      
   	public function __construct(){
		parent::__construct();
		$db = \Config\Database::connect();
	}

	public function check_login($data){
		$email = $data['email']; 
		$password = $data['password']; 
		$encrypted_password = md5($password);
		$query = $this->db->query("SELECT * FROM users_t WHERE user_email = '$email' AND password = '$encrypted_password' AND deleted_date IS NULL");
		$res= $query->getRowArray();
		if(!empty($res)){
			$result = $res;
		}else{
			$result = 'fail';
		}
		return $result;
	}

	public function checkpassword($password){
		$user_id = $_SESSION['user_id'];
		$password = implode(',',$password);
		$encrypted_password = md5($password);
		$query = $this->db->query("SELECT password FROM users_t WHERE password = '$encrypted_password' AND id='$user_id'");
		$res= $query->getRowArray();
		if(!empty($res)){
			$result = 'success';
		}else{
			$result = 'fail';
		}
		return $result;
	}

	public function updatePassword($data){

		$user_id = $_SESSION['user_id'];
		$encrypted_password = md5($data['new_password']);

		$up = array(
			'password' 	=>	$encrypted_password
		);

		$query = $this->db->table('users_t');
		$query->where('id',$user_id);
        	$res = $query->update($up);
       
        	if($res){
    
 			$status = array(
 				'success' => 'success',
                'message' => 'Password updated Successfully',
 			);
			
 		}else{
 			$status = array(
 				'fail'		=> 'fail',
                'message' 	=> 'Something went wrong',
 			);
 		}
		return $status;
	}

	public function getUserProfile(){
		$user_id = $_SESSION['user_id'];
		$query = $this->db->query("SELECT * FROM users_t WHERE id='$user_id'");
		$res= $query->getRowArray();
		return $res;
	}

	public function updateProfile($data,$img){
	
		$susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');

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
			'user_name' 	=> $data['name'],
			'user_email' 	=> $data['email'],
			'user_mobile' 	=> $data['mobile'],
			'user_status' 	=> $data['user_status'],
			'user_image' 	=> $filename,
			'updated_by' 	=> $susername,
			'updated_date'  => $current_datetime,
				
		);
			
		$query = $this->db->table('users_t');
		$query->where('id',$data['user_id']);
	    	$res = $query->update($update);
	    	if($res){
    
 			$status = array(
 				'success' => 'success',
                'message' => 'Profile updated Successfully',
 			);
			
 		}else{
 			$status = array(
 				'fail' 		=> 'fail',
                'message' 	=> 'Something went wrong',
 			);
 		}
		return $status;
	}


}
?>