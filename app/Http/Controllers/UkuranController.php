<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    public function index()
    {
        $ukurans = Ukuran::all();
        return response()->json([
            'success' => true,
            'message' => 'List semua ukuran',
            'data' => $ukurans,
        ]);
    }

    public function show($id)
    {
        $ukuran = Ukuran::find($id);
        if (!$ukuran) {
            return response()->json(['message' => 'Ukuran not found'], 404);
        }
        return response()->json($ukuran);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required|string|max:255',
        ]);

        $ukuran = Ukuran::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Ukuran berhasil ditambahkan',
            'data' => $ukuran,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        $ukuran = Ukuran::find($id);
        if (!$ukuran) {
            return response()->json(['message' => 'Ukuran not found'], 404);
        }

        $ukuran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ukuran berhasil dihapus',
        ]);
    }
}
