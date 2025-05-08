<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Download QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 90%;
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
        }
        .qr-code {
            margin: 1rem 0;
        }
        .qr-code img {
            max-width: 300px;
            height: auto;
        }
        .download-link {
            margin-top: 1rem;
            color: #0066cc;
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            background-color: #0066cc;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .download-link:hover {
            background-color: #0052a3;
            text-decoration: none;
        }
        .url-display {
            margin-top: 1rem;
            padding: 0.5rem;
            background-color: #f8f9fa;
            border-radius: 4px;
            word-break: break-all;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>AOJ Company Profile QR Code</h1>
        <div class="qr-code">
            @if(file_exists(public_path('images/qrcode.png')))
                <img src="{{ asset('images/qrcode.png') }}" alt="QR Code for PDF Download">
            @else
                <p>QR Code image not available. Please try refreshing the page.</p>
            @endif
        </div>
        <div class="url-display">
            QR Code URL: {{ $pdfUrl }}
        </div>
        <a href="{{ $pdfUrl }}" class="download-link" download>
            Click here to download PDF directly
        </a>
    </div>
</body>
</html>
