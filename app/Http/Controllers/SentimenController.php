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
       

        return view('admin.review', $data);
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
                return redirect()->back()->with('success', 'Terimakasih atas review yang telah diberikan.');
            } else {
                // Redirect back with an error message
                return redirect()->back()->withErrors('Error analyzing review. Please try again.');
            }
        }
    }



    public function destroy($id)
    {
        $sentimen = Sentimen::findOrFail($id);
        $sentimen->delete();

        return redirect()->route('sentimen.index')->with('success', 'Sentiment deleted successfully.');
    }
}
