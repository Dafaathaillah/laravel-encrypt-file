<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListData extends Model
{
    use HasFactory;

    public function usr()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
