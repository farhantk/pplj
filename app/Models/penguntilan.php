<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo; 
use App\Models\user;

class penguntilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_karyawan',
        'jenis_pupuk',
        'pecahan_pupuk',
        'jumlah',
        'user_id',
    ];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
