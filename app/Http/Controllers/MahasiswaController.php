<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SimpanMahasiswaRequest;

class MahasiswaController extends Controller
{
    //
    public $mahasiswa;

    public function __construct()
    {
        $this->mahasiswa = [
            ['nim' => 11, 'nama' => 'Icang', 'angkatan' => 2016],
            ['nim' => 12, 'nama' => 'Ros', 'angkatan' => 2017],
            ['nim' => 13, 'nama' => 'Jum', 'angkatan' => 2016],
            ['nim' => 14, 'nama' => 'Pania', 'angkatan' => 2017],
            ['nim' => 15, 'nama' => 'Ulil', 'angkatan' => 2018],
        ];
    }


    public function showAll()
    {
        return view('mahasiswa_list',[
            'mahasiswa' => $this->mahasiswa
        ]);
    }

    public function showMahasiswa($nim)
    {
        $mahasiswa = [
            'nim' => $nim,
            'nama' => 'icang',
            'angkatan' => 2016,
        ];

        return view('mahasiswa_detail', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function showAdd()
    {
        return view('mahasiswa_add');
    }

    public function simpan(SimpanMahasiswaRequest $request)
    {
        // $data = $request->validate([
            
        // ]);

        // dd($data);

        // return response('data berhasil disimpan');

        $pesan = 'Mahasiswa dengan nama '.$request->nama.' berhasil disimpan';
        return redirect('/students')->with('pesan', $pesan);
    }
}
