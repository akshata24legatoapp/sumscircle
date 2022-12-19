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

  
    public function Catlog_view()
    {
        $data['Catlog_view'] = $this->model->Catlog_view();
        echo view('header');
        return view('Catlog/Catlog_view',$data);
        echo view('footer');
    }

    public function Catlog_add()
    {
        echo view('header');
        return view('Catlog/Catlog_add');
        echo view('footer');
    }
 
    public function Catlog_update($id)
    {
        $data['Catlog_view'] = $this->model->Catlog_view($id);
        echo view('header');
        return view('Catlog/Catlog_edit',$data);
        echo view('footer');
    }
    
    public function Catlog_delete()
    {
        $id = isset($_REQUEST['delete_id']) ? $_REQUEST['delete_id'] : "";
        $this->model->Catlog_delete($id);
        return redirect()->route('Catlog-view');
    }

    public function Catlog_update_done()
    {
        $this->model->Catlog_update_done($_POST);
        return redirect()->route('Catlog-view');
    }

    public function Catlog_upload()
    {
        $this->model->Catlog_add($_POST);
        return redirect()->route('Catlog-view');
    }

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
        $this->model->add_master_attr($_POST);
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
        $this->model->add_attr_variation($_POST);
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

?>