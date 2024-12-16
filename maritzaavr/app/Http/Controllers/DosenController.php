<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'nip' => 'required|string|unique:dosens',
        ]);

        $dosen = Dosen::create($data);

        return response()->json($dosen, 201);
    }

    public function read()
    {
        return response()->json(Dosen::all(), 200);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $data = $request->validate([
            'nama' => 'string',
            'nip' => 'string|unique:dosens,nip,' . $id, // Unique kecuali NIP saat ini
        ]);

        $dosen->update($data);

        return response()->json($dosen, 200);
    }

    public function delete($id)
    {
        Dosen::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
