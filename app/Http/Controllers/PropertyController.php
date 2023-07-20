<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Exception;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'properties';
        $data = Property::latest()->get();
        return view('dashboardpages.properties.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'properties';
        return view('dashboardpages.properties.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $title = 'properties';
        return view('dashboardpages.properties.show', compact('title', 'property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        $title = 'properties';
        return view('dashboardpages.properties.edit', compact('title', 'property'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        unlink($property->foto);
        $property->delete();
        return redirect()->back()->with('success', 'Data property berhasil dihapus');
    }
}
