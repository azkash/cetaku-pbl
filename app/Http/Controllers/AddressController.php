<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'label' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:20',
            'nomor_hp' => 'required|string|max:20',
        ]);

        $address = Address::create($request->all());

        return response()->json([
            'message' => 'Address created successfully',
            'data' => $address
        ], 201);
    }

    public function show($id)
    {
        return Address::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $request->validate([
            'label' => 'sometimes|required|string|max:255',
            'alamat_lengkap' => 'sometimes|required|string',
            'kecamatan' => 'sometimes|required|string|max:255',
            'kota' => 'sometimes|required|string|max:255',
            'provinsi' => 'sometimes|required|string|max:255',
            'kode_pos' => 'sometimes|required|string|max:20',
            'nomor_hp' => 'sometimes|required|string|max:20',
        ]);

        $address->update($request->all());

        return response()->json($address, 200);
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return response()->json([
            'message' => 'Address deleted successfully'
        ], 200);
    }
}
