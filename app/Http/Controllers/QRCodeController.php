<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function index()
    {
        $pdfUrl = 'https://orion-contracting.com/uploads/AOJ%20COMPANY%20PROFILE.pdf';

        // Generate QR code using Google Charts API
        $googleChartApi = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($pdfUrl);

        // Get QR code image content
        $qrcode = file_get_contents($googleChartApi);

        // Save the QR code image
        $path = public_path('images/qrcode.png');
        file_put_contents($path, $qrcode);

        return view('qrcode');
    }
}
