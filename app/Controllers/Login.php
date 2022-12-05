<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
   
    public function __construct(){
       
      
    }

   public function index(){
        return view('login/login');
    }

    

    
}


?>