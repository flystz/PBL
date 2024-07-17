<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiProxyController extends Controller
{
    public function proxyApriori(Request $request)
    {
        $client = new Client();

        try {
            $response = $client->post('https://aprioripk.up.railway.app/apriori', [
                'json' => $request->all()
            ]);

            return response($response->getBody(), $response->getStatusCode())
                ->header('Content-Type', $response->getHeader('Content-Type')[0]);
        } catch (RequestException $e) {
            $statusCode = $e->getResponse() ? $e->getResponse()->getStatusCode() : 500;
            $message = $e->getMessage();

            return response()->json([
                'error' => 'Failed to fetch data from the external API.',
                'message' => $message
            ], $statusCode);
        }
    }
}
