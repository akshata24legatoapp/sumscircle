<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
   
    public function __construct(){
       
       $this->admin_model = new AdminModel();
    }

    public function index(){
        $data['title'] = 'Roles list';
        $data['roles_record'] = $this->admin_model->getAllRoles();
        return view('admin/role',$data);
    }

    public function add_role(){
        $data['menus'] = $this->admin_model->getAllMenu_list();
        return view('admin/add_role',$data);
    }

    public function edit_role($role_id = ''){
        $data['role_id'] = $role_id;
        $data['menus'] = $this->admin_model->getAllMenuByRoleId($role_id);
        $data['role_data'] = $this->admin_model->getRoleById($role_id);
        return view('admin/edit_role',$data);
    }

    public function save_role(){
        $data = $this->request->getPost();
        $res = $this->admin_model->save_role($data);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('admin');
    }

    public function deleteRole(){
        $role_id = $this->request->getPost();
        $res = $this->admin_model->deleteRole($role_id);
        echo json_encode($res);
    }
    
    public function user_list(){
        $data['users'] = $this->admin_model->getAllUser_list();
        return view('admin/user_list',$data);
    }

    public function add_users(){
        $data['roles'] = $this->admin_model->getRoles();
        return view('admin/add_user',$data);
    }

    public function edit_user($id=''){
        $data['user_id'] = $id;
        $data['user_record'] = $this->admin_model->getUserById($id);
        $data['roles'] = $this->admin_model->getRoles();
        return view('admin/edit_user',$data);
    }

    public function save_users(){
        $data = $this->request->getPost();
        $img = $this->request->getFile('user_image');
        $this->admin_model->save_users($data,$img);
        return redirect()->route('user_list');
    }

    public function view_user_rights($user_id){
        $data['user_record'] = $this->admin_model->getUserById($user_id);
        $data['menuuserrights'] = $this->admin_model->getMenuuser_rights($user_id);
        $data['userrights'] = $this->admin_model->getuser_rights($user_id);
        return view('admin/view_user_rights',$data);
    }

    public function deleteUser(){
        $user_id = $this->request->getPost();
        $res = $this->admin_model->deleteUser($user_id);
        //echo json_encode(array("status" => TRUE,"message"=>"You have successfully deleted user!"));
        echo json_encode($res);
    }

    
}
?>