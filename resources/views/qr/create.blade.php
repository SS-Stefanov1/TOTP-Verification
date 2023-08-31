<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Generate QR Code Examples</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container mt-4">
        <div style="text-align: center;">
            <div class="card-header">
                <h2>Scan your <u>secret</u> code below</h2>
            </div>
            <div class="card-body">
                {!! QrCode::size(300)->generate('RemoteStack') !!}
            </div>
        </div>
    </div>
</body>
</html>
