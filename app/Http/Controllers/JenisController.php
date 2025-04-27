<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        return response()->json([
            'success' => true,
            'message' => 'List semua jenis',
            'data' => $jenis,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);

        $jenis = Jenis::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Jenis berhasil ditambahkan',
            'data' => $jenis,
        ], 201);
    }

    public function show($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis not found'], 404);
        }
        return response()->json($jenis);
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $jenis = Jenis::find($id);
        if (!$jenis) {
            return response()->json(['message' => 'Jenis not found'], 404);
        }
        $jenis->delete();
        return response()->json(['message' => 'Jenis deleted']);
    }
}
