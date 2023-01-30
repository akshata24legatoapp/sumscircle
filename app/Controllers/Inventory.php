<?php

namespace App\Controllers;

use App\Models\InventoryModel;
use App\Libraries\DBLib;

class Inventory extends BaseController
{
   
    public function __construct(){
       
       $this->inventory_model = new InventoryModel();
       $this->lib = new DBLib();
    }

    public function index(){
        $data['user_right'] = $this->lib->getuser_rights(3,10);
        $data['inventory'] = $this->inventory_model->getInventoryList();
        return view('inventory/inventory_list',$data);
    }

    public function add_inventory(){
        $data['user_right'] = $this->lib->getuser_rights(3,10);
        $data['products'] = $this->inventory_model->getProductList();
        return view('inventory/add_inventory',$data);
    }

    public function getProductsku(){
        $product_id = $this->request->getVar();
        $res = $this->inventory_model->getProductsku($product_id);
        echo json_encode($res);
    }

    public function save_inventory(){
        $data = $this->request->getPost();
        $res = $this->inventory_model->save_inventory($data);
        $this->session->setFlashdata($res['status'],$res['response']);
        return redirect()->route('inventory');
    }

    public function edit_inventory($inventory_id=''){
        $data['user_right'] = $this->lib->getuser_rights(3,10);
        $data['inventory_id'] = $inventory_id;
        $data['inventory_data'] = $this->inventory_model->edit_inventory($inventory_id);
        $data['products'] = $this->inventory_model->getProductList();
        return view('inventory/edit_inventory',$data);
 
    }
}
?>