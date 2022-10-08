<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /** 
     * index
     * @return void
     */

    public function index(){
        // get pots 
        $pegawai = Pegawai::paginate(5);
        
        return view('pegawai.index', compact('pegawai'));
     }

     public function destroy($id)
     {
        $pegawai = Pegawai::where('id',$id)->firstorfail()->delete();
        echo ("Pegawai Berhasil Dihapus");
        return redirect()->route('pegawai.index')->with((['success'
            => 'Data berhasil Dihapus']));
     }
}
