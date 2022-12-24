<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use Illuminate\Http\Request;

class ListDataAdminController extends Controller
{
    public function index(){
        return view('admin.listdata');
    }

    public function save(Request $req){
        $user = auth()->user()->id_user;
        $validateData = $req->validate([
            'nama_pemohon' => 'required|max:255',
            'alamat' => 'required',
            'image_encrypt' => 'required|file',
        ]);
        $validateData['user_id'] = $user;
        // if (empty($req->id)) {
        //     $data = KategoriPost::create($validateData);
        // }else{
        //     $data = KategoriPost::where('id_kategori', $req->id)->update($validateData);
        // }
        $data = Profile::updateOrCreate(['user_id' => $user], $validateData);
        // dd($data);

        return response()->json($data);
    }
}
