<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class TableStatusController extends Controller
{
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'indikator' => 'required|numeric',
        ]);

        $meja = Meja::find($validated['id']);
        if ($meja) {
            // Meja::where('id', $validated['id'])->update(['indikator' => $validated['indikator']]);
            $meja->status = $validated['indikator'] ? 1 : 0; // Assuming status is an integer (1 for occupied, 0 for unoccupied)
            $meja->save();
            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Table not found'], 404);
        }
    }

    public function getStatus()
    {
        $meja = Meja::all();
        return response()->json($meja);
    }
}
