<?php

namespace App\Models;

use CodeIgniter\Model;

class Catlog_model extends Model
{

	public function __construct()
	{
		parent::__construct();
		
	}

	//Catlog model codels
	public function category_view($id = '')
	{
		$builder = $this->db->table('category_t');
		$builder->where('deleted_by', '');
		if (!empty($id)) {
			$builder->where('id', $id);
		}
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function category_delete($id)
	{
		$data = [
			// 'category_status' => '0',
			'deleted_by' => $_SESSION['username'],
			'deleted_date' => date("Y-m-d H:i:s"),
		];
		$builder = $this->db->table('category_t');
		$builder->where('id', $id);
		$result = $builder->update($data);
		
		// echo $this->db->getLastQuery();
	}

	public function category_update_done($value)
	{
		$susername = $_SESSION['username'];
		$hidden_id = $value['hidden_id'];
		$data = [
			'category_name' => $value['cat_name'],
			'category_type' => $value['cat_type'],
			'category_status' => $value['Status'],
			'updated_date' => date("Y-m-d H:i:s"),
			'updated_by' => $susername,
		];
		$builder = $this->db->table('category_t');
		$builder->where('id', $hidden_id);
		$result = $builder->update($data);
		$status = [
			'success' => 'success',
			'message' => 'Updated Successfully',
		];
		return $status;

	}

	public function category_add($value)
	{
		$builder = $this->db->table('category_t');
		$data = [
			'category_name' => $value['cat_name'],
			'category_type' => $value['cat_type'],
			'category_status' => $value['Status'],
			'created_by' => $_SESSION['username'],
		];
		$data['created_date'] = date("Y-m-d H:i:s");
		$result = $builder->insert($data);
		$status = [
			'success' => 'success',
			'message' => 'Added Successfully',
		];
		return $status;
	}

	//master attributes model
	public function add_master_attr($value)
	{
		if ($value['hiddenvalue'] == '') {
			// $result = $this->lib->insert_master_Att($values);
			$builder = $this->db->table('master_attributes_t');
			$data = [
				'attributes_name' => $value['master_attr_name'],
				'attributes_status' => $value['Status'],
				'created_by' => $_SESSION['username'],
				'created_date' => date("Y-m-d H:i:s"),
			];
			$result = $builder->insert($data);
			$status = [
				'success' => 'success',
				'message' => 'Added Successfully',
			];
		} else {
			// $result = $this->lib->update_master_attr($values);
			$data = [
				'attributes_name' => $value['master_attr_name'],
				'attributes_status' => $value['Status'],
				'updated_by' => $_SESSION['username'],
				'updated_date' => date("Y-m-d H:i:s"),
			];
			$builder = $this->db->table('master_attributes_t');
			$builder->where('id', $value['hiddenvalue']);
			$result = $builder->update($data);
			// echo $this->db->getLastQuery();
			$status = [
				'success' => 'success',
				'message' => 'Updated Successfully',
			];
		}
		return $status;

	}

	public function view_master_attr()
	{
		// $result = $this->lib->view_master_Att();
		$builder = $this->db->table('master_attributes_t');
		// $builder->where('attributes_status' , '1');
		$builder->where('deleted_by', '');
		if (!empty($id)) {
			$builder->where('id', $id);
		}
		$query   = $builder->get();
		return $query->getResultArray();
		// $data['view_master_attr'] = $result;
		// return $result;
	}

	public function delete_master_attr($id)
	{
		// $result = $this->lib->delete_master_Att($id);
		$data = [
			// 'attributes_status' => '0',
			'deleted_by' => $_SESSION['username'],
			'deleted_date' => date("Y-m-d H:i:s"),
		];
		$builder = $this->db->table('master_attributes_t');
		$builder->where('id', $id);
		$result = $builder->update($data);
		$redirect_url = 'master-attribute-view';
		return $redirect_url;
	}

	public function update_master_attr($id = '')
	{
		// $result = $this->lib->view_master_Att($id);
		$builder = $this->db->table('master_attributes_t');
		// $builder->where('attributes_status' , '1');
		if (!empty($id)) {
			$builder->where('id', $id);
		}
		$query   = $builder->get();
		return $query->getResultArray();
		// $data['update_master_valu'] = $result;
		// return $data;
	}

	// attributes variations model

	public function dropdone_master_val()
	{
		// $result = $this->lib->dropdone_master_val();
		$builder = $this->db->table('master_attributes_t');
		// $builder->where('attributes_status' , '1');
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function add_attr_variation($value)
	{
		if ($value['hiddenvalue'] == '') {
			// $result = $this->lib->insert_att_variation($values);
			$builder = $this->db->table('attributes_variations_t');
			$data = [
				'master_attribute_id' => $value['drop_val'],
				'attribute_variation_name' => $value['attr_variation_name'],
				'attribute_variation_status' => $value['Status'],
				'created_by' => $_SESSION['username'],
				'created_date' => date("Y-m-d H:i:s"),
			];
			$result = $builder->insert($data);
			$status = [
				'success' => 'success',
				'message' => 'Added Successfully',
			];
		} else {
			// $result = $this->lib->update_attr_variation($values);
			$data = [
				'master_attribute_id' => $value['drop_val'],
				'attribute_variation_name' => $value['attr_variation_name'],
				// 'attribute_variation_status' => $value['Status'],
				'deleted_by' => '',
				'updated_by' => $_SESSION['username'],
				'updated_date' => date("Y-m-d H:i:s"),
			];
			$builder = $this->db->table('attributes_variations_t');
			$builder->where('id', $value['hiddenvalue']);
			$result = $builder->update($data);
			$status = [
				'success' => 'success',
				'message' => 'Updated Successfully',
			];
		}
		return $status;
	}

	public function view_att_variation()
	{
		$builder = $this->db->table('attributes_variations_t');
		$builder->join('master_attributes_t', "master_attributes_t.id=attributes_variations_t.master_attribute_id");
		$builder->where('attributes_variations_t.deleted_by', '');
		$builder->select('*,attributes_variations_t.id as idsget');
		// $builder->where('attribute_variation_status' , '1');
		if (!empty($id)) {
			$builder->where('id', $id);
		}
		$query = $builder->get();
		return $query->getResultArray();
	
		
	}

	public function update_attr_variation($id)
	{
		$builder = $this->db->table('attributes_variations_t');
		if (!empty($id)) {
			$builder->where('id', $id);
		}
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function attr_variation_delete($id)
	{
		// $result = $this->lib->delete_attr_variation($id);
		$data = [
			// 'attribute_variation_status' => '0',
			'deleted_by' => $_SESSION['username'],
			'deleted_date' => date("Y-m-d H:i:s"),
		];
		$builder = $this->db->table('attributes_variations_t');
		$builder->where('id', $id);
		$result = $builder->update($data);
		
	}
}
