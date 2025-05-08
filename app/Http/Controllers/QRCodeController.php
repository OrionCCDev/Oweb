<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
                file_put_contents($path, $response->body());
            }
        } catch (\Exception $e) {
            // Log error if needed
            \Log::error('QR Code generation failed: ' . $e->getMessage());
        }

        return view('qrcode');
    }
}
