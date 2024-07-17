<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentimen;
use Illuminate\Support\Facades\Http;

class SentimenController extends Controller
{
    public function index()
    {
        $sentimen = Sentimen::all();
        $data['sentimen'] = $sentimen;
        return view('admin.review', $data );
    }

    public function create()
    {
        return view('admin.review.create');
    }

    public function store(Request $request)
    { {
        // Validate the request
        $request->validate([
            'review' => 'required|string',
        ]);

        // Get the review from the request
        $review = $request->input('review');

        // Call the sentiment analysis API
        $response = Http::post('https://model-sentimen-analisis-makanan-production.up.railway.app/predict', [
            'text' => $review,
        ]);

        if ($response->successful()) {
            // Get the prediction from the API response
            $prediksi = $response->json('prediction');

            // Create a new Sentimen record
            $sentimen = Sentimen::create([
                'review' => $review,
                'prediksi' => $prediksi,
            ]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Review successfully submitted and analyzed!');
        } else {
            // Redirect back with an error message
            return redirect()->back()->withErrors('Error analyzing review. Please try again.');
        }
    }
}

    public function show(Sentimen $sentimen)
    {
        return view('admin.review.show', compact('sentimen'));
    }

    public function edit(Sentimen $sentimen)
    {
        return view('admin.review.edit', compact('sentimen'));
    }

    public function update(Request $request, Sentimen $sentimen)
    {
        $request->validate([
            'review' => 'required',
            'prediksi' => 'required|boolean',
        ]);

        $sentimen->update($request->all());

        return redirect()->route('admin.review.index')->with('success', 'Sentiment updated successfully.');
    }

    public function destroy(Sentimen $sentimen)
    {
        $sentimen->delete();

        return redirect()->route('admin.review.index')->with('success', 'Sentiment deleted successfully.');
    }
}
