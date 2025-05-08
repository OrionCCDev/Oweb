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

        // Generate QR code using QR Server API
        $apiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($pdfUrl);

        try {
            // Get QR code image content
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                // Save the QR code image
                $path = public_path('images/qrcode.png');

                // Create directory if it doesn't exist
                if (!file_exists(public_path('images'))) {
                    mkdir(public_path('images'), 0755, true);
                }

                // Save the image
                if (file_put_contents($path, $response->body())) {
                    Log::info('QR code generated successfully');
                } else {
                    Log::error('Failed to save QR code image');
                }
            } else {
                Log::error('QR Server API request failed: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('QR Code generation failed: ' . $e->getMessage());
        }

        // Pass the PDF URL to the view
        return view('qrcode', [
            'pdfUrl' => $pdfUrl
        ]);
    }
}
