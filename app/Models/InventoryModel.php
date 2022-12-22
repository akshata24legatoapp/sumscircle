<?php 

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model{
      
   	public function __construct(){
		parent::__construct();
		$db = \Config\Database::connect();
	}

	public function getInventoryList(){
		$sql =  $this->db->query("SELECT inventory_master_t.*,product_t.product_name
				FROM inventory_master_t
				LEFT JOIN product_t ON product_t.id = inventory_master_t.product_id");
		$res = $sql->getResultArray();
		return $res;
	}

	public function getProductList(){
		$sql = $this->db->query("SELECT * FROM product_t where product_status = '1' AND deleted_date IS NULL");
		$res = $sql->getResultArray();
		return $res;
	} 

	public function getProductsku($product_id){
		$product_id = implode(' ',$product_id);
		$sql = $this->db->query("SELECT product_sku FROM product_t where id = '$product_id'");
		$res = $sql->getRowArray();
		return $res;
	}

	public function edit_inventory($inventory_id){
		//$inventory_id = implode(' ',$inventory_id);
		$sql = $this->db->query("SELECT * FROM inventory_master_t where id = '$inventory_id'");
		$res = $sql->getRowArray();
		return $res;
	}

	public function save_inventory($data){

		$susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');

		$data_array = array(
			'product_id' 		=> $data['product_id'],
			'product_sku' 		=> $data['product_sku'],
			'default_quantity' 	=> $data['default_quantity'],
			'sold_quantity' 	=> $data['sold_quantity'],
			'status' 			=> $data['status'],
			
		);

		if(empty($data['inventory_id'])){
			
			
			$in = array(
				'created_by' 		=> $susername,
				'created_date'  	=> $current_datetime,
				
			);

			$insert = array_merge($data_array,$in);
			$query = $this->db->table('inventory_master_t');
		    $res = $query->insert($insert);
		    $insertid = $this->db->insertID();
		    if(!empty($insertid)){

		    	$status = array(
	 				'status' 	=> 'success',
					'response' 	=> 'Inventory added successfully'
	 			);
				
	 		}else{
	 			$status = array(
	 				'status' 	=> 'fail',
					'response' 	=> 'something went wrong'
	 			);
	 		}
		}else{

			$up = array(
				'updated_by' 		=> $susername,
				'updated_date'  	=> $current_datetime,
			);

			$update = array_merge($data_array,$up);
			$query = $this->db->table('inventory_master_t');
			$query->where('id',$data['inventory_id']);
		    $res = $query->update($update);
		    if(!empty($res)){

		    	$status = array(
	 				'status' 	=> 'success',
					'response' 	=> 'Inventory updated successfully'
	 			);
				
	 		}else{
	 			$status = array(
	 				'status' 	=> 'fail',
					'response' 	=> 'something went wrong'
	 			);
	 		}
		   
		}
		

 		return $status;
	}
}

?>