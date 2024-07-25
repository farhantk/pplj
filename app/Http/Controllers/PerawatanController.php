<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\perawatan;

class PerawatanController extends Controller
{
    public function index(){

        // Dapatkan penguntilan yang dibuat oleh user
        $perawatan = Perawatan::where('user_id', Auth::user()->id)->get();
        

        return view('User/perawatan', [
            'role' => Auth::user()->role,
            'email' => Auth::user()->email,
            'name' => Auth::user()->name,
            'perawatans' => $perawatan,
            'isActive' => 'perawatan',
            'avatar' => Auth::user()->avatar,
        ]);
    }

    public function action_addPerawatan(Request $request){
        
        $validated = $request->validate([
            'jumlah_rusak' => 'required',
            'jumlah_rawat' => 'required',
            'area' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        perawatan::create($validated);

        return redirect('/perawatan');
    }
    public function action_edit(Request $request, $id){
        $perawatan = Perawatan::findOrFail($id);
        $validated = $request->validate([
            'jumlah_rusak' => 'required',
            'jumlah_rawat' => 'required',
            'area' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        
        $perawatan->update($validated);

        return redirect('/perawatan');
    }
    public function destroy($id){
        //get product by ID
        $perawatan = perawatan::findOrFail($id);
        $perawatan->delete();

        return redirect('/perawatan');
    }
}
