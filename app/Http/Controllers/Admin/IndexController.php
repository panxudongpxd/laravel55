<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function view;
use App\User;

class IndexController extends Controller
{
    public function index()
    {
    	//dd(session('success'));
    	$data=User::where('name',session('success'))->first();
    	//$url=$data->myfile;

        return view('admin.index',['data'=>$data]);
    }
    
}
