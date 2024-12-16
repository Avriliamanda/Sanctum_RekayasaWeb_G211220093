<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'sks' => 'required|integer',
        ]);

        $makul = Makul::create($data);

        return response()->json($makul, 201);
    }

    public function read()
    {
        return response()->json(Makul::all(), 200);
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);

        $data = $request->validate([
            'nama' => 'string',
            'sks' => 'integer',
        ]);

        $makul->update($data);

        return response()->json($makul, 200);
    }

    public function delete($id)
    {
        Makul::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
