<?php

namespace App\Http\Controllers;

use App\Models\ListData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;

class ListDataAdminController extends Controller
{
    public function index(){
        // $users = ListData::with(['usr'])->find(auth()->user())->first();
        // dd($users);
        if (auth()->user()->role == 'user') {
            $user = User::find(auth()->user()->id)->first();
            $list = ListData::with('usr')->where('user_id', auth()->user()->id)->get(); 
            return view('admin.listdata', compact('user', 'list'));
        }elseif(auth()->user()->role == 'admin'){
            $user = User::find(auth()->user()->id)->first();
            $list = ListData::with('usr')->get(); 
            return view('admin.listdata', compact('user', 'list'));
        }
    }

    public function save(Request $req){
        $user = auth()->user()->id;
        $tanggal = Carbon::now()->toDateTimeString();
        $validateData = $req->validate([
            'nama_pemohon' => 'required|max:255',
            'tanggal_pengajuan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'kodepos' => 'required',
            'warna' => 'required',
            'deskripsi' => 'required',
            'merk' => 'required',
            'kelas' => 'required',
            'jenis' => 'required',
            'alamat' => 'required',
            'image_encrypt' => 'required|image',
        ]);
        $validateData['user_id'] = $user;
        $validateData['image_encrypt'] = $req->file('image_encrypt')->store('image-encrypt');
        // $validateData['tanggal_pengajuan'] = $tanggal;

        $data = ListData::updateOrCreate(['id' => $req->id], $validateData);
        // if (empty($req->id)) {
        //     $data = ListData::create($validateData);
        // } else {
        //     $data = ListData::firstWhere($req->id)->update($validateData);
        //     $data = ListData::where('id', $req->id)->update($validateData);
        // }
        // dd($data);

        return response()->json($data);
    }

    public function show(ListData $listdata)
    {
        return response()->json($listdata->load(['usr']));
    }

    public function destroy(ListData $listdata)
    {
        // Storage::delete($banner->img);
        $data = $listdata->delete();
        return response()->json($data);
    }

    public function pdf($id){
        $show = ListData::find($id);
        $pdf = PDF::loadview('admin.pdf', compact('show'));
        return $pdf->stream();
        // return view('admin.pdf', compact('show'));
    }
    // public function pdfmarketing($id)
}
