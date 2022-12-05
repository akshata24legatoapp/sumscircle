<?php

namespace App\Controllers;

//use App\Models\LoginModel;

class Roles extends BaseController
{
   
    public function __construct(){
       
      
    }

   public function index(){
        return view('roles/role');
    }

     public function add_role(){
        return view('roles/add_role');
    }

    

    
}


?>