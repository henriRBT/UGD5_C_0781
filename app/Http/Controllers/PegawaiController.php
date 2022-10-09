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

      /**
      * create
      *
      * @return void
      */
      public function create()
      {
        
         return view('pegawai.create');
      }

   /**
      * store
      *
      * @param Request $request
      * @return void
   */
  public function store(Request $request){
         //Validasi Formulir
         $this->validate($request, [
         'nomor_induk_pegawai' => 'required',
         'nama_pegawai' => 'required|max:15',
         'email' => 'required|email',
         'telepon' => 'required|between:10,13',
         
      ]);

      //Fungsi Simpan Data ke dalam Database
      Pegawai::create([
         'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
         'nama_pegawai'    => $request->nama_manager,
         'email'  => $request->email,
         'telepon'  => $request->telepon,
      ]);

      return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan']);
  }
     public function edit($id)
     {
       $pegawai = Pegawai::where('id', $id)->first();
       return view('pegawai.update')->with('pegawai', $pegawai);
     }
 
      /**
       * store
       *
       * @param Request $request
       * @return void
    */
       public function update(Request $request, $id){
          //Validasi Formulir
          $this->validate($request, [
          'nomor_induk_pegawai' => 'required',
          'nama_pegawai'=>'required|max:15',
          'email' => 'required|email',
          'telepon' => 'required|between:10,13',
       ]);

       Pegawai::find($id)->update([
         'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
         'nama_pegawai'    => $request->nama_manager,
         'email'  => $request->email,
         'telepon'  => $request->telepon,
       ]);
 
       return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil diedit']);
    }
    
     public function destroy($id)
     {
        $pegawai = Pegawai::where('id',$id)->firstorfail()->delete();
        echo ("Pegawai Berhasil Dihapus");
        return redirect()->route('pegawai.index')->with((['success'
            => 'Data berhasil Dihapus']));
     }
}
