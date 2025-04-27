<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index()
    {
        $items = Item::all();
        return response()->json([
            'success' => true,
            'message' => 'List semua item',
            'data' => $items,
        ]);
    }

    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_item' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|string',
        ]);

        $item = Item::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil ditambahkan',
            'data' => $item,
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $item->delete();
        return response()->json(['message' => 'Item deleted']);
    }
}
