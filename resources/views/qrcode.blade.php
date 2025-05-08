<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Download QR Code</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
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
        }
        h1 {
            color: #333;
            margin-bottom: 1rem;
        }
        #qrcode {
            margin: 1rem 0;
        }
        .download-link {
            margin-top: 1rem;
            color: #0066cc;
            text-decoration: none;
        }
        .download-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>AOJ Company Profile QR Code</h1>
        <div id="qrcode"></div>
        <a href="{{ asset('uploads/AOJ COMPANY PROFILE.pdf') }}" class="download-link" download>
            Click here to download PDF directly
        </a>
    </div>

    <script>
        // Create QR code
        const qr = qrcode(0, 'M');
        qr.addData('{{ asset('uploads/AOJ COMPANY PROFILE.pdf') }}');
        qr.make();

        // Create QR code image
        const qrImage = qr.createImgTag(10);
        document.getElementById('qrcode').innerHTML = qrImage;
    </script>
</body>
</html>
