<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends AdminController
{
    public function index(){
        return view(env('THEME').'.admin.index',[]);
    }

}
