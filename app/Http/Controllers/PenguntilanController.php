<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\penguntilan;


class PenguntilanController extends Controller
{
    public function index(){
        // Dapatkan penguntilan yang dibuat oleh user
        $penguntilan = Penguntilan::where('user_id', Auth::user()->id)->get();

        return view('User/penguntilan', [
            'role' => Auth::user()->role,
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'penguntilans' => $penguntilan,
            'isActive' => 'penguntilan',
            'avatar' => Auth::user()->avatar,
        ]);
    }

    public function action_addPenguntilan(Request $request){
        
        $validated = $request->validate([
            'jumlah_karyawan' => 'required',
            'jenis_pupuk' => 'required',
            'pecahan_pupuk' => 'required',
            'jumlah' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        penguntilan::create($validated);

        return redirect('/penguntilan');
    }
    public function action_edit(Request $request, $id){
        $penguntilan = Penguntilan::findOrFail($id);
        $validated = $request->validate([
            'jumlah_karyawan' => 'required',
            'jenis_pupuk' => 'required',
            'pecahan_pupuk' => 'required',
            'jumlah' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        $penguntilan->update($validated);

        return redirect('/penguntilan');
    }

    public function destroy($id){
        //get product by ID
        $penguntilan = penguntilan::findOrFail($id);
        $penguntilan->delete();

        return redirect('/penguntilan');
    }

}
