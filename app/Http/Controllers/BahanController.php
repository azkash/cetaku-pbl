<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use Illuminate\Http\Request;

class BahanController extends Controller
{
    public function index()
    {
        $bahans = Bahan::all();
        return response()->json([
            'success' => true,
            'message' => 'List semua bahan',
            'data' => $bahans,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bahan' => 'required|string|max:255',
        ]);

        $bahan = Bahan::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Bahan berhasil ditambahkan',
            'data' => $bahan,
        ], 201);
    }

    public function show($id)
    {
        $bahan = Bahan::find($id);
        if (!$bahan) {
            return response()->json(['message' => 'Bahan not found'], 404);
        }
        return response()->json($bahan);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $bahan = Bahan::find($id);
        if (!$bahan) {
            return response()->json(['message' => 'Bahan not found'], 404);
        }
        $bahan->delete();
        return response()->json(['message' => 'Bahan deleted']);
    }
}
