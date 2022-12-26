<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class ListDataGuestController extends Controller
{
    public function index(){
        // $user = User::all();
        $list = ListData::with(['usr'])->get();
        return view('guest.listdata', compact('list'));
    }

    public function show(ListData $listdata)
    {
        return response()->json($listdata->load(['usr']));
    }

    public function encrypt($id)
    {
        $show = ListData::find($id);
        return view('guest.showencrypt', compact('show'));
        // return response()->json($listdata->load(['usr']));
    }

    public function pdf($id){
        $show = ListData::find($id);
        $pdf = PDF::loadview('guest.pdf', compact('show'));
        return $pdf->stream();
        // return view('admin.pdf', compact('show'));
    }
}
