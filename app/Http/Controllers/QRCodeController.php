<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QRCodeController extends Controller
{
    public function index()
    {
        $pdfUrl = 'https://orion-contracting.com/uploads/AOJ%20COMPANY%20PROFILE.pdf';

        // Create QR code renderer
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );

        // Create QR code writer
        $writer = new Writer($renderer);

        // Generate QR code
        $qrcode = $writer->writeString($pdfUrl);

        // Save the QR code image
        $path = public_path('images/qrcode.png');
        file_put_contents($path, $qrcode);

        return view('qrcode');
    }
}
