<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
   
    public function __construct(){
        $this->dashboard_model = new DashboardModel();
    }

    public function index(){
        return view('dashboard/dashboard');
    }
}
?>