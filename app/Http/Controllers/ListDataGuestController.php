<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use Illuminate\Http\Request;

class ListDataGuestController extends Controller
{
    public function index(){
        $list = ListData::all();
        return view('guest.listdata', compact('list'));
    }
}
