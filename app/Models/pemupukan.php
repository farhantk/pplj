<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo; 
use App\Models\user;

class pemupukan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'jenis',
        'jumlah_piringan',
        'jumlah_pupuk',
        'user_id',
    ];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
