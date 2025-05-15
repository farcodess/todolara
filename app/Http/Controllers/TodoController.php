<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Corrected the namespace here
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function tampilkantodo() {
        $datatodo = DB::table('tb_todo')
        ->join('tb_pegawai', 'tb_todo.tugas_dari', '=', 'tb_pegawai.id')
        ->select(
            'tb_todo.id',
            'tb_todo.tugas',
            'tb_pegawai.nama as pemberi_tugas',
            'tb_todo.keterangan'
           

        )
        ->get();

        return view('pengguna.index', ['dataTodos' => $datatodo]);
    }

    function detailtugas($id){
        // $tugas = DB::table('tb_todo')
        // ->where('id', $id)
        // ->get();

        $tugas = DB::table('tb_todo as td' )
        ->join('tb_pegawai as pengirim', 'td.tugas_dari', '=', 'pengirim.id' )
        ->join('tb_pegawai as penerima', 'td.tugas_untuk', '=', 'penerima.id' )
        ->select(
            'td.id',
            'td.tugas',
            'pengirim.nama as pemberi_tugas',
            'penerima.nama as penerima_tugas',
            'td.keterangan',
            'td.created_at',
            'td.updated_at'
        )->where('td.id', $id
        )->get();

        return view('pengguna.detail_tugaas' , ['detailTodo' => $tugas]);
    }
    
    function hapustodos($id){
        DB::table('tb_todo')
        ->where('id', $id)
        ->delete();
        return redirect('/pengguna');
    }

    function tambahtugas(){

        $databos = DB::table('tb_pegawai')
        ->where('jabatan', '=', 'CEO')
        ->get();

        $datapegawai = DB::table('tb_pegawai')
        ->where('jabatan', '!=', 'CEO')
        ->get();
        
        return view('pengguna.tambahtugas',
        ['databos' => $databos],
        ['datapegawai' => $datapegawai]);
    }

    function simpantugas(Request $request){
        DB::Table('tb_todo')
        ->insert([
            'tugas' => $request->namaTugas,
            'waktu_mulai' => $request->waktumulai,
            'waktu_selesai' => $request->waktuselesai,
            'tugas_dari' => $request->tugasdari,
            'tugas_untuk' => $request->tugasuntuk,
            'keterangan' => $request->keterangan
        ]); 
        return redirect('/pengguna');
      

    }
}












