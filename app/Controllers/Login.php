<?php 
namespace App\Controllers;

//header('Access-Control-Allow-Origin: *');
//defined('BASEPATH') or exit('No direct script access allowed');

use App\Models\LoginModel;

class Login extends BaseController
{
   
    public function __construct(){
        $this->login_model = new LoginModel();
    }

    public function index(){
        return view('login/login');
    }

      public function check_login(){

        $data = $this->request->getPost();

        $res =  $this->login_model->check_login($data);
       
        if($res != 'fail'){
            if($res['user_status'] == '1'){
                if($data['email'] == $res['user_email'] &&(md5($data['password']) == $res['password'])){

                     $sessiondata = [
                        'user_id'   => $res['id'],
                        'role_id'   => $res['role_id'],
                        'username'  => $res['user_name'],
                        'email'     => $res['user_email'],
                        'logged_in' => TRUE
                    ];

                    $this->session->set($sessiondata);
                   
                    $page = redirect()->route('dashboard');
                    $resp=array('status'=>'success',
                                'message'=>'User Successfully Login',
                                'reload'=> base_url('dashboard'),  
                                );
                    
                     
                }else{
                    $page = redirect()->route('login');
                    $resp=array('status'=>'fail',
                            'message'=>'Sorry! Invalid Email and Password. Please try again',
                            'reload'=> base_url('login'),
                            );

                }
            }else{
                $page = redirect()->route('login');
                $resp=array('status'=>'fail',
                            'message'=>'Sorry! User is not active',
                            'reload'=> base_url('login'),
                            );

            }
        }else{
             $resp=array('status'=>'fail',
                            'message'=>'Sorry! Invalid Email and Password. Please try again',
                            'reload'=> base_url('login'),
                            );
        }
        
        echo json_encode($resp);
    }

    public function logout(){
       //$this->session->destroy();
        //$this->session->stop();
        session_destroy();
        return redirect()->route('login'); 
    }

    public function change_password(){
        return view('login/change_password');
    }

    public function checkpassword(){
        $password = $this->request->getPost();
        $res = $this->login_model->checkpassword($password);
        echo json_encode($res);
    }

    public function updatePassword(){
        $data = $this->request->getPost();
        $res = $this->login_model->updatePassword($data);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('change_password');
    }

    public function view_profile(){
        $data['user_records'] = $this->login_model->getUserProfile();
        return view('login/view_profile',$data);
    }

    public function updateProfile(){
        $data = $this->request->getPost();
        $img = $this->request->getFile('user_image');
        $res = $this->login_model->updateProfile($data,$img);
        $this->session->setFlashdata($res['success'],$res['message']);
        return redirect()->route('view_profile');
    }

    
}
