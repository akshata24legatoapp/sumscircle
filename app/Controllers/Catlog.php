<?php

namespace App\Controllers;
use CodeIgniter\Model;
use App\Models\Catlog_model;
//use App\Models\LoginModel;

class Catlog extends BaseController
{
    public function __construct(){
        // $db = \Config\Database::connect();
        $this->model = new Catlog_model();
    }

  
    public function category_view()
    {
        $data['category_view'] = $this->model->category_view();
        echo view('header');
        return view('Catlog/category_view.php',$data);
        echo view('footer');
    }

    public function category_add()
    {
        echo view('header');
        return view('Catlog/category_add');
        echo view('footer');
    }
 
    public function category_update($id)
    {
        $data['category_view'] = $this->model->category_view($id);
        echo view('header');
        return view('Catlog/category_edit',$data);
        echo view('footer');
    }
    
    public function category_delete()
    {
        $id = isset($_REQUEST['delete_id']) ? $_REQUEST['delete_id'] : "";
        $this->model->category_delete($id);
        return redirect()->route('view-category');
    }

    public function category_update_done()
    {
        $res = $this->model->category_update_done($_POST);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('view-category');
    }

    public function category_upload()
    {
        $res = $this->model->category_add($_POST);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('view-category');
    }

// master attribute controller
    public function master_attr_view()
    {
        // $data = $this->model->view_master_attr();
        $data['view_master_attr'] = $this->model->view_master_attr();
        echo view('header');
        return view('Catlog/master_attr_view',$data);
        echo view('footer');
    }
    
    public function master_attr_upload()
    {
        $res = $this->model->add_master_attr($_POST);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('master-attribute-view');
    }

    public function master_attr_delete()
    {
        $id = isset($_REQUEST['delete_id']) ? $_REQUEST['delete_id'] : "";
        $this->model->delete_master_attr($id);
        return redirect()->route('master-attribute-view');
    }

    public function master_attr_update()
    {
        $id = isset($_REQUEST['val_id']) ? $_REQUEST['val_id'] : "";
        $response = $this->model->update_master_attr($id);
        // return $response;
        echo json_encode($response);
        // return redirect()->route('master-attribute-view');
    }
    
    // attributes variations function
    public function attr_variation_list()
    {
        $data['dropdone_master_val'] = $this->model->dropdone_master_val();
        $data['view_att_variation'] = $this->model->view_att_variation();
     
        // $data['view_master_attr'] = $this->model->view_master_attr();
        // print_r($data['view_att_variation']);  
        return view('Catlog/attributes_variations',$data);
    }
    public function attr_variation_upload()
    {
        $res = $this->model->add_attr_variation($_POST);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('attribute-variation-list');
    }
  
    public function attr_variation_update()
    {
        $id = isset($_REQUEST['val_id']) ? $_REQUEST['val_id'] : "";
        $response = $this->model->update_attr_variation($id);
        echo json_encode($response);
    }

    public function attr_variation_delete()
    {
        $id = isset($_REQUEST['delete_id']) ? $_REQUEST['delete_id'] : "";
        $this->model->attr_variation_delete($id);
        return redirect()->route('attribute-variation-list');
    }

}
