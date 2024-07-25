<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pemupukan;

class PemupukanController extends Controller
{
    public function index(){

        // Dapatkan penguntilan yang dibuat oleh user
        $pemupukan = Pemupukan::where('user_id', Auth::user()->id)->get();
        

        return view('User/pemupukan', [
            'role' => Auth::user()->role,
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'pemupukans' => $pemupukan,
            'isActive' => 'pemupukan',
            'avatar' => Auth::user()->avatar,
        ]);
    }

    public function action_addPemupukan(Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'jumlah_piringan' => 'required',
            'jumlah_pupuk' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        pemupukan::create($validated);

        return redirect('/pemupukan');
    }
    public function action_edit(Request $request, $id){
        $pemupukan = Pemupukan::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'jumlah_piringan' => 'required',
            'jumlah_pupuk' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        $pemupukan->update($validated);

        return redirect('/pemupukan');
    }
    public function destroy($id){
        //get product by ID
        $pemupukan = pemupukan::findOrFail($id);
        $pemupukan->delete();

        return redirect('/pemupukan');
    }
}
