<?php

namespace App\Http\Controllers;

use App\Models\Ekspedisi;
use Illuminate\Http\Request;

class EkspedisiController extends Controller
{
    // Get semua ekspedisi
    public function index()
    {
        return Ekspedisi::all();
    }

    // Create ekspedisi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ekspedisi' => 'required|string',
            'layanan' => 'required|string',
            'estimasi' => 'required|string',
            'ongkos_kirim' => 'required|numeric',
        ]);

        $ekspedisi = Ekspedisi::create($validated);

        return response()->json($ekspedisi, 201);
    }

    // Get satu ekspedisi berdasarkan id
    public function show($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        return $ekspedisi;
    }

    // Update ekspedisi
    public function update(Request $request, $id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);

        $validated = $request->validate([
            'nama_ekspedisi' => 'string',
            'layanan' => 'string',
            'estimasi' => 'string',
            'ongkos_kirim' => 'numeric',
        ]);

        $ekspedisi->update($validated);

        return response()->json($ekspedisi);
    }

    // Hapus ekspedisi
    public function destroy($id)
    {
        $ekspedisi = Ekspedisi::findOrFail($id);
        $ekspedisi->delete();

        return response()->json(['message' => 'Ekspedisi deleted']);
    }
}
