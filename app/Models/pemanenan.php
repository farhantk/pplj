<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo; 
use App\Models\user;

class pemanenan extends Model
{
    use HasFactory;
    protected $fillable = [
        'lokasi',
        'area',
        'jumlah',
        'user_id',
    ];
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
