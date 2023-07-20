<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // navigasi ke index
    public function index()
    {
        $title = 'properties';
        $data = Property::latest()->get();
        return view('dashboardpages.properties.index', compact('title', 'data'));
    }

    // navigasi ke view create
    public function create()
    {
        $title = 'properties';
        return view('dashboardpages.properties.create', compact('title'));
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|mimes:jpg,png,jpeg',
            'nama_properti' => 'required|string',
            'lokasi' => 'required',
            'keterangan' => 'required|string|min:10',
        ]);

        $foto = $request->file('foto');
        $namaFoto = date('YmdHis') . '.' . $foto->getClientOriginalName();
        $lokasiFoto = 'image/';
        $foto->move($lokasiFoto, $namaFoto);

        Property::create([
            'foto' => $lokasiFoto . $namaFoto,
            'nama_properti' => $request->nama_properti,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('properties.index')->with('success', 'Data Properti Berhasil Ditambahkan');
    }

    // navigasi ke view show
    public function show(Property $property)
    {
        $title = 'properties';
        return view('dashboardpages.properties.show', compact('title', 'property'));
    }

    // navigasi ke view edit
    public function edit(Property $property)
    {
        $title = 'properties';
        return view('dashboardpages.properties.edit', compact('title', 'property'));
    }

    // update data
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'nama_properti' => 'required|string',
            'lokasi' => 'required',
            'keterangan' => 'required|string|min:10',
        ]);

        // cek foto apakah ada update
        $foto = $request->file('foto');
        if (empty($foto)) {
            $property->update([
                'nama_properti' => $request->nama_properti,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->keterangan
            ]);
        } else {
            unlink($property->foto);
            $namaFoto = date('YmdHis') . '-' . $foto->getClientOriginalName();
            $lokasiFoto = 'image/';
            $foto->move($lokasiFoto, $namaFoto);
            $property->update([
                'foto' => $lokasiFoto . $namaFoto,
                'nama_properti' => $request->nama_properti,
                'lokasi' => $request->lokasi,
                'keterangan' => $request->lokasi,
            ]);
        }
        return redirect()->route('properties.index')->with('success', 'Data berhasil di update');
    }

    // Hapus Data
    public function destroy(Property $property)
    {
        unlink($property->foto);
        $property->delete();
        return redirect()->back()->with('success', 'Data property berhasil dihapus');
    }
}
