<?php

namespace App\Http\Controllers;


/* Import Model */

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
}
