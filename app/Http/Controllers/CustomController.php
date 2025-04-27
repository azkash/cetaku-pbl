<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function index()
    {
        $customs = Custom::with(['item', 'ukuran', 'bahan', 'jenis'])->get();
        return response()->json($customs);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|exists:items,id',
            'ukuran_id' => 'required|exists:ukurans,id',
            'bahan_id' => 'required|exists:bahans,id',
            'jenis_id' => 'required|exists:jenis,id',
            'harga' => 'required|numeric',
        ]);

        $custom = Custom::create($validated);

        return response()->json($custom, 201);
    }

    public function show($id)
    {
        $custom = Custom::with(['item', 'ukuran', 'bahan', 'jenis'])->findOrFail($id);
        return response()->json($custom);
    }

    public function update(Request $request, $id)
    {
        $custom = Custom::findOrFail($id);

        $validated = $request->validate([
            'item_id' => 'sometimes|exists:items,id',
            'ukuran_id' => 'sometimes|exists:ukurans,id',
            'bahan_id' => 'sometimes|exists:bahans,id',
            'jenis_id' => 'sometimes|exists:jenis,id',
            'harga' => 'sometimes|numeric',
        ]);

        $custom->update($validated);

        return response()->json($custom);
    }

    public function destroy($id)
    {
        $custom = Custom::findOrFail($id);
        $custom->delete();

        return response()->json(['message' => 'Custom deleted']);
    }
}
