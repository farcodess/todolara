<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Corrected the namespace here
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PenggunaController extends Controller
{
    public function index(){
        $todo = DB::table('tb_todo')->get();
        return view('pengguna.index',
        [
            'datatugas' => $todo
        ]);
    }
}
