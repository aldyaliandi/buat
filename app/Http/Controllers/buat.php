<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class buat extends Controller
{
    public function index()
    {
        $buat = buat::all();
        return view('buat.index', compact('buat'));
    }

    public funtion create()
    {
        retrun view ('buat.create');
    }

    public function store(Request $request)
        {
    // untk ke form create
    $request validate([
        'nama' => 'required',
        'alamat' => 'required',
    ]);
    //fungsi untuk simpan data
    //insert into buat SET nama = $nama,
    //                      alamat = $alamat

    buat::create($request->all());
    return redirect()->route('buat.index')
                    ->with('succes','Nama berhasil disimpan');
    }

    public function show(Request $request, buat $buat)
    {
        return view ('buat.edit', compact('buat'));
    }

    public function edit(buat $buat)
    {
        return view('buat.edit', compact('buat'));
    }

    public function update(Request $request, buat $buat)
    {
        //fun validasi
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);
        // fun update
        $buat ->update($request->all());

        return redirect()->route('baut.index')->with('succes','buat done');
    }

    public function destroy(buat $buat)
    {
        return redirect()->route('buat.index')->with('succes','buat berhasil didelete');
    }

}
