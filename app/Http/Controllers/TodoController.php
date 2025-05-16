<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Corrected the namespace here
use Illuminate\Http\Request;

class TodoController extends Controller
{
    function tampilkantodo() {
        $datatodo = DB::table('tb_todo')
        ->join('tb_pegawai as pemberi', 'tb_todo.tugas_dari', '=', 'pemberi.id')
        ->join('tb_pegawai as penerima', 'tb_todo.tugas_untuk', '=', 'penerima.id' )
        ->select(
            'tb_todo.id',
            'tb_todo.tugas',
            'pemberi.nama as pemberi_tugas',
            'penerima.nama as penerima_tugas',
            'tb_todo.keterangan',
           

        )
        ->get();

        return view('admin.index', ['dataTodos' => $datatodo]);
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
            'td.waktu_mulai',
            'td.waktu_selesai',
            'td.created_at',
            'td.updated_at'
        )->where('td.id', $id
        )->get();

        return view('admin.detail_tugaas' , ['detailTodo' => $tugas]);
    }
    
    function hapustodos($id){
        DB::table('tb_todo')
        ->where('id', $id)
        ->delete();
        return redirect('/admin');
    }

    function tambahtugas(){

        $databos = DB::table('tb_pegawai')
        ->where('jabatan', '=', 'CEO')
        ->get();

        $datapegawai = DB::table('tb_pegawai')
        ->where('jabatan', '!=', 'CEO')
        ->get();
        
        return view('admin.tambahtugas',
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
        return redirect('/admin');
    }

    function edittugas($id){
    $tugas = DB::table('tb_todo')
    ->select('id', 'tugas', 'waktu_mulai', 'waktu_selesai', 'tugas_dari', 'tugas_untuk', 'keterangan')
    ->where('id', '=', $id)
    ->first(); 

    $databos = DB::table('tb_pegawai')
    ->where('jabatan', '=', 'CEO')
    ->get();

    $datapegawai = DB::table('tb_pegawai')
    ->where('jabatan', '!=', 'CEO')
    ->get();
    
    return view('admin.edittugas', [
        'databos' => $databos,
        'datapegawai' => $datapegawai,
        'tugas' => $tugas
    ]);
}


function simpanedit(Request $request, $id){
    DB::table('tb_todo')
    ->where('id', $id)
    ->update([
        'tugas' => $request->namaTugas,
        // 'waktu_mulai' => $request->waktumulai,
        // 'waktu_selesai' => $request->waktuselesai,
        'tugas_dari' => $request->tugasdari,
        'tugas_untuk' => $request->tugasuntuk,
        'keterangan' => $request->keterangan
    ]);
    return redirect('/admin');
}

}












