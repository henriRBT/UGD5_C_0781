<?php

namespace App\Http\Controllers;


/* Import Model */

use Mail;
use App\Mail\DepartemenMail;
use App\Models\Departemen;
use Illuminate\Http\Request;


class DepartemenController extends Controller
{
     /** 
     * index
     * @return void
     */

     public function index(){
        // get pots 
        $departemen = Departemen::paginate(5);
        return view('departemen.index', compact('departemen'));
     }

      /**
      * create
      *
      * @return void
      */
      public function create()
      {
         return view('departemen.create');
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
         'nama_departemen' => 'required',
         'nama_manager'    => 'required',
         'jumlah_pegawai'  => 'required'
      ]);

      //Fungsi Simpan Data ke dalam Database
      Departemen::create([
         'nama_departemen' => $request->nama_departemen,
         'nama_manager'    => $request->nama_manager,
         'jumlah_pegawai'  => $request->jumlah_pegawai
      ]);

      try{
         //Mengisi variabel yang akan ditampilkan pada view mail
         $content = [
            'body' => $request->nama_departemen,
         ];

      //Mengirim email ke emailtujuan@gmail.com
         Mail::to('henritom1301@gmail.com')->send(new DepartemenMail($content));
      
         //Redirect jika berhasil mengirim email
         return redirect()->route('departemen.index')->with(['success' => 'Data Berhasil Disimpan, email telah terkirim!']);
      
      } catch(Exception $e){
      //Redirect jika gagal mengirim email
         return redirect()->route('departemen.index')->with(['success' => 'Data Berhasil Disimpan, namun gagal mengirim email!']);
      }
   }

   /**
      * store
      *
      * @param Request $request
      * @return void
   */

   public function edit($id)
    {
      $departemen = Departemen::where('id', $id)->first();
      return view('departemen.update')->with('departemen', $departemen);
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
         'nama_departemen' => 'required',
         'nama_manager'    => 'required',
         'jumlah_pegawai'  => 'required'
      ]);

   
      Departemen::find($id)->update([
         'nama_departemen' => $request->nama_departemen,
         'nama_manager'    => $request->nama_manager,
         'jumlah_pegawai'  => $request->jumlah_pegawai
      ]);

      return redirect()->route('departemen.index')->with(['success' => 'Data berhasil diedit']);
   }

   public function destroy($id)
   {
      $departemen = Departemen::where('id',$id)->firstorfail()->delete();
      echo ("Departemen Berhasil Dihapus");
      return redirect()->route('departemen.index')->with((['success'
          => 'Data berhasil Dihapus']));
   }


}


