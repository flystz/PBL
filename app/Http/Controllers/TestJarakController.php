<?php

namespace App\Http\Controllers;

use App\Models\DataJarak;
use Illuminate\Http\Request;

class TestJarakController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'indikator' => 'required|numeric',
            'indikator_2' => 'required|numeric',
            
        ]);

        DataJarak::create($validatedData);  
        return response()->json(['message' => 'Data received successfully'],200);
    }
    public function getAllData()
    {
        $data = DataJarak::latest()->first(['indikator', 'indikator_2']);
        return response()->json($data);
    }
    public function getJarak()
    {
        $data = DataJarak::latest()->first(['indikator_2']);
        return response()->json($data);
    }
    
    

}

