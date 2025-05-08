<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index()
    {
        $pdfUrl = 'https://orion-contracting.com/uploads/AOJ%20COMPANY%20PROFILE.pdf';

        // Generate QR code and save it
        $qrCode = QrCode::format('png')
            ->size(300)
            ->generate($pdfUrl);

        // Save the QR code to public directory
        $qrPath = public_path('images/qrcode.png');
        file_put_contents($qrPath, $qrCode);

        return view('qrcode');
    }
}
