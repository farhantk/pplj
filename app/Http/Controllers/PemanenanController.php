<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\pemanenan;

class PemanenanController extends Controller
{
    public function index(){

        // Dapatkan penguntilan yang dibuat oleh user
        $pemanenan = Pemanenan::where('user_id', Auth::user()->id)->get();
        

        return view('User/pemanenan', [
            'role' => Auth::user()->role,
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'pemanenans' => $pemanenan,
            'isActive' => 'pemanenan',
            'avatar' => Auth::user()->avatar,
        ]);
    }

    public function action_addPemanenan(Request $request){
        
        $validated = $request->validate([
            'lokasi' => 'required',
            'area' => 'required',
            'jumlah' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        pemanenan::create($validated);

        return redirect('/pemanenan');
    }
    public function action_edit(Request $request, $id){
        $pemanenan = Pemanenan::findOrFail($id);
        $validated = $request->validate([
            'lokasi' => 'required',
            'area' => 'required',
            'jumlah' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        $pemanenan->update($validated);

        return redirect('/pemanenan');
    }
    public function destroy($id){
        //get product by ID
        $pemanenan = pemanenan::findOrFail($id);
        $pemanenan->delete();

        return redirect('/pemanenan');
    }
}
