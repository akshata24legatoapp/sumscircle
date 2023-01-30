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

	public function display_products()
    {
        $query = $this->db->query("SELECT * FROM product_t WHERE deleted_date IS NULL");
        $res = $query->getResultArray();
        //$data['product'] = $res;
        return $res;
    }

    //  catlog function
    public function display_catlog_prdct()
    {
		$query = $this->db->query("SELECT * FROM category_t  WHERE  category_status = 1");
        $res = $query->getResultArray();
        return $res;
    }

    //  attribute variations 
    public function display_attribute_variation($att_id = '')
    {
        $query = $this->db->query("SELECT attributes_variations_t.attribute_variation_name,attributes_variations_t.id
        FROM attributes_variations_t
        JOIN master_attributes_t
        ON   master_attributes_t.id = attributes_variations_t.master_attribute_id
        WHERE attributes_variations_t.master_attribute_id = '$att_id' ");

        $res = $query->getResultArray();
        return $res;
    }

    public function attribute_name()
    {
    	$username = $_SESSION['username'];
        $query = $this->db->query("SELECT * FROM master_attributes_t WHERE attributes_status = 1 AND created_by = '$username' ");
        $res = $query->getResultArray();
        return $res;
    }

    public function add_product($data, $multi_img)
    {
        $username = $_SESSION['username'];
        $hidden = $data['prdct_hidden_files'];
        $hidden_diff = explode(",", $hidden);

        $img_arr = array();
        foreach ($hidden_diff as $key => $val) {
            array_push($img_arr, $val);
        }

        $insert = array(
            'product_category_id' => $data['cat_id'],
            'product_name'     => $data['product_name'],
            'product_sku'     => $data['product_sku'],
            'short_description' => $data['short_description'],
            'long_description'     => $data['product_description'],
            'product_status' => $data['status'],
            'created_by' => $username,
            'created_date' => date("Y-m-d H:i:s"),
            //'deleted_by' => $username,
        );


        $query = $this->db->table('product_t');
        $query->insert($insert);
        $last_insert_id = $this->db->insertID();



        foreach ($multi_img as $val) {
            if (in_array($val->getName(), $img_arr)) {

                $imgName = $val->getName();
                if (!file_exists(ROOTPATH . 'public/assets/images/productImgs/' . $imgName)) {
                    if ($val->move(ROOTPATH . 'public/assets/images/productImgs/', $imgName)) {
                        $filename = $imgName;
                        $insert = array(
                            'product_id' => $last_insert_id,
                            'attatched_file_name'     =>  $filename,
                        );
                        
                        $query = $this->db->table('product_attatchedfile_t');
                        $res = $query->insert($insert);
                    } else {
                        $filename = '';
                    }
                } else {
                    $filename = '';
                }
            }
        }

        //return product id 
        return ($last_insert_id);
    }

    public function update_attributes($data)
    {

        $hidden_id = $data['product_id'];
        $query = $this->db->query("DELETE FROM `product_attributes_variation_t` WHERE product_id = '$hidden_id'");

        foreach ($data['upname'] as $key => $val) {
            $att_val = $data['checkboxp_' . $val];
            // print_r($att_val);

            foreach ($att_val as $k => $value) {

                $update = array(
                    'product_id' =>  $hidden_id,
                    'master_attribute_id' => $val,
                    'attributes_variations_id' => $value
                );

                $query = $this->db->table('product_attributes_variation_t');
                $res = $query->insert($update);
            }
        }
    }


    public function getproduct_variation($id)
    {
        $query = $this->db->query("SELECT * FROM product_attributes_variation_t WHERE product_id ='$id' ");
        $res = $query->getResultArray();
        return $res;
    }

    public function edit_product($id)
    {
        // fetch other content
        $query = $this->db->query("SELECT * FROM product_t WHERE id ='$id' ");
        $res['prdct'] = $query->getRowArray(); // fetching one value only 

        // fetch attributes 
        $query = $this->db->query("SELECT * FROM product_attributes_variation_t WHERE product_id ='$id' ");
        $res['attri'] = $query->getResultArray();

        //fetch img
        $query = $this->db->query("SELECT * FROM product_attatchedfile_t WHERE  product_id ='$id' ");
        $res['prdct_img'] = $query->getResultArray();

        return $res;
    }

    public function update_product($data, $multis)
    {
       	
        $hidden_id = $data['product_id'];
        $hiddenimg = $data['hiddenimg'];

        $insert = array(
            'product_category_id' => $data['cat_id'],
            'product_name'     => $data['product_name'],
            'product_sku'     => $data['product_sku'],
            'short_description' => $data['short_description'],
            'long_description'     => $data['product_description'],
            'product_status' => $data['status'],
            'created_by' => 'Radhika',
            'created_date' => date("Y-m-d H:i:s"),
            'updated_by' => 'Radhika',
            'updated_date' => date("Y-m-d H:i:s"),
           	
        );

        $query = $this->db->table('product_t');
        $query->where('id', $hidden_id);
        $res = $query->update($insert);

     
        if (($hiddenimg[0] != '') && ($multis[0]->getName() == '')) {    /* if there is no any new image for insert*/

			$query = $this->db->query("DELETE FROM `product_attatchedfile_t` WHERE product_id = '$hidden_id'");

            foreach ($hiddenimg as $val) {
                $imgName = $val;
                if ($val != '') {
                    $filename = $val;
                } else {
                    $filename = '';
                }
                $insert = array(
                    'product_id' => $hidden_id,
                    'attatched_file_name' =>  $filename,
                );

                $query = $this->db->table('product_attatchedfile_t');
                $res = $query->insert($insert);
            }
        } else if(($hiddenimg[0] == '') && ($multis[0]->getName() != '')){
        	
        	if(!empty($data['prdct_hidden_files'])){
        		$hidden_image = $data['prdct_hidden_files'];
        		$afterexplode = explode(",", $hidden_image);
        	}else{
        		$afterexplode = [];
        	}
		    $img_arr = array();
		    foreach ($afterexplode as $key => $val) {
		        array_push($img_arr, $val);
		    }

		    foreach ($multis as $key => $val) {
		       	if(in_array($val->getName(), $img_arr)) {
	                $image_name = $val->getName();
	                if (!file_exists('public/assets/images/productImgs/' . $image_name)) {
	                    $val->move('public/assets/images/productImgs/', $image_name);
	                    $insert = array(
	                        'product_id' => $hidden_id,
	                        'attatched_file_name' =>  $image_name
	                    );
	                 	$query = $this->db->table('product_attatchedfile_t');
	                    $res = $query->insert($insert);
	                }else {
	                     echo $image_name . 'This File already exists';
	                }
                }
		    }

        	
        } else if(($hiddenimg[0] != '') && ($multis[0]->getName() != '')){
        	if(!empty($data['prdct_hidden_files'])){
        		$hidden_image = $data['prdct_hidden_files'];
        		$afterexplode = explode(",", $hidden_image);
        	}else{
        		$afterexplode = [];
        	}

        	$img_arr = array();
		    foreach ($afterexplode as $key => $val) {
		        array_push($img_arr, $val);
		    }

		    foreach ($multis as $key => $val) {
		       	if(in_array($val->getName(), $img_arr)) {
	                $image_name = $val->getName();
	                if (!file_exists('public/assets/images/productImgs/' . $image_name)) {
	                    $val->move('public/assets/images/productImgs/', $image_name);
	                    $insert = array(
	                        'product_id' => $hidden_id,
	                        'attatched_file_name' =>  $image_name
	                    );
	                 	$query = $this->db->table('product_attatchedfile_t');
	                    $res = $query->insert($insert);
	                }else {
	                     echo $image_name . 'This File already exists';
	                }
                }
		    }

        }else {
            echo '';
        }
    }
   
   	public function delete_img($id){
   		
   		$deleted_img = $this->db->query("SELECT attatched_file_name  FROM `product_attatchedfile_t` WHERE id = '$id'");
        $res = $deleted_img->getRowArray();

        $img_name = $res['attatched_file_name'];
        //$path = APPPATH2."images/productImgs/".$img_name;
        $path = "public/assets/images/productImgs/".$img_name;
        
        if (unlink($path)) {
            $del = $this->db->query("DELETE FROM `product_attatchedfile_t` WHERE id = '$id'");
        } else {
            echo 'not unlinked';
        }
   	}

   	public function delete_product($id)
    {
        $susername = $_SESSION['username'];
		$current_datetime = date('Y-m-d H:i:s');
        $query = $this->db->query("UPDATE product_t  SET deleted_date =  '$current_datetime' , deleted_by = '$susername' WHERE id = '$id'");
        $query = $this->db->query("DELETE FROM `product_attatchedfile_t` WHERE product_id = '$id' ");
        $query = $this->db->query("DELETE FROM `product_attributes_variation_t` WHERE product_id = '$id' ");
        return $query;
    }

}
?>
