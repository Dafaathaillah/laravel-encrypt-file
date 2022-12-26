<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user =  User::where('role', 'user')->count();
        $admin = User::where('role', 'admin')->count();
        $encrypt = ListData::count();
        return view('admin.dashboard', compact('user', 'admin', 'encrypt'));
    }
}
