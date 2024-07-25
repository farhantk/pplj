<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pemanenan;
use App\Models\penguntilan;
use App\Models\perawatan;
use App\Models\pemupukan;

class DashboardController extends Controller
{
    public function index(){

        // Dapatkan penguntilan yang dibuat oleh user
        $pemanenan = Pemanenan::with('user')->get();
        $pemupukan = Pemupukan::with('user')->get();
        $penguntilan = Penguntilan::with('user')->get();
        $perawatan = Perawatan::with('user')->get();
        

        return view('dashboard', [
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'role' => Auth::user()->role,
            'pemanenans' => $pemanenan,
            'pemupukans' => $pemupukan,
            'penguntilans' => $penguntilan,
            'perawatans' => $perawatan,
            'isActive' => 'beranda',
            'avatar' => Auth::user()->avatar,
        ]);
    }
}
