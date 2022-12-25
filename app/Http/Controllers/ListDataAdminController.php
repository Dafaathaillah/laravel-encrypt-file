<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ListDataAdminController extends Controller
{
    public function index(){
        // $users = ListData::with(['usr'])->find(auth()->user())->first();
        // dd($users);
        $user = User::find(auth()->user()->id)->first();
        $list = ListData::with('usr')->where('user_id', auth()->user()->id)->get(); 
        return view('admin.listdata', compact('user', 'list'));
    }

    public function save(Request $req){
        $user = auth()->user()->id;
        $validateData = $req->validate([
            'nama_pemohon' => 'required|max:255',
            'alamat' => 'required',
            'image_encrypt' => 'required|image',
        ]);
        $validateData['user_id'] = $user;
        $validateData['image_encrypt'] = $req->file('image_encrypt')->store('image-encrypt');

        $data = ListData::updateOrCreate(['id' => $req->id], $validateData);
        // if (empty($req->id)) {
        //     $data = ListData::create($validateData);
        // } else {
        //     $data = ListData::firstWhere($req->id)->update($validateData);
        // }
        // dd($data);

        return response()->json($data);
    }

    public function show(ListData $listdata)
    {
        return response()->json($listdata->load(['usr']));
    }
}
