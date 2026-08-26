<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class QRCodeController extends Controller
{
    public function index()
    {
        $pdfUrl = 'https://orion-contracting.com/uploads/AOJ%20COMPANY%20PROFILE.pdf';
        $path = public_path('images/qrcode.png');

        // Generate the QR image once and reuse it, instead of hitting the
        // external API and rewriting the file on every single request.
        if (!file_exists($path)) {
            try {
                $apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($pdfUrl);
                $response = Http::timeout(10)->get($apiUrl);

                if ($response->successful()) {
                    if (!file_exists(public_path('images'))) {
                        mkdir(public_path('images'), 0755, true);
                    }
                    file_put_contents($path, $response->body());
                } else {
                    Log::error('QR Server API request failed: ' . $response->status());
                }
            } catch (\Exception $e) {
                Log::error('QR Code generation failed: ' . $e->getMessage());
            }
        }

        // Pass the PDF URL to the view
        return view('qrcode', [
            'pdfUrl' => $pdfUrl
        ]);
    }
}
