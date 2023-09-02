@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>QR code generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row col-md-6">
            <h1>QR Code generate</h1>
            <form method="post" action="{{ route('QRCode.generate') }}">
                @csrf
                <div class="mb-3">
                    <label for="qr-message" class="form-label">Text</label>
                    <input type="text" class="form-control" id="qr-message" name="qr_message" aria-describedby="message-help">
                    <div id="message-help" class="form-text">The message that you want to save in code.</div>
                </div>
                <input type="submit" class="btn btn-success">
            </form>
            <div class="text-center">
                @if(\Session::has('qrImage'))
                    <div class="mb-3">
                        <img src="{{ asset(\Session::get('qrImage')) }}" class="img img-responsive">
                    </div>
                    <a href="{{ asset(\Session::get('qrImage')) }}" class="btn btn-primary" download>Download</a>
                    {{ \Session::forget('qrImage') }}
                @endif
            </div>
        </div>
    </div>
</body>
</html>
@endsection
