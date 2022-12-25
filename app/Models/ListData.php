<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListData extends Model
{
    // protected $primaryKey = 'id_listdata';
    use HasFactory;
    protected $table = "list_data";
    protected $fillable = [ 
        "image_encrypt",
        "nama_pemohon",
        "email",
        "tanggal_pengajuan",
        "alamat",
        "kota",
        "provinsi",
        "fax",
        "kodepos",
        "warna",
        "deskripsi",
        "merk",
        "kelas",
        "jenis",
        "user_id",
    ];
    public function usr()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
