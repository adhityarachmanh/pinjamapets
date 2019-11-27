<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\User;
class AdminController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

   
    public function index()
    {
        $sewa=Sewa::all()->count();
        $user=User::all()->count();
        return view('admin.dashboard',[
            'status'=>'dashboard'
        ]);
    }
}
