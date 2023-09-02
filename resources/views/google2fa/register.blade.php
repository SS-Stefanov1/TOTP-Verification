@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <div class="card">
                <div class="card-header" style="text-align: center;">Set up Google Authenticator</div>
                <div class="card-body" style="text-align: center;">
                    <p>Set up your two factor authentication by scanning the barcode below.</p>
                    <div>
                        <!-- {!! QrCode::size(150)->generate('Still in progress :D'); !!} -->
                        {!! $QR_Image !!}
                    </div>
                    <p style="margin-top: 12px;">You must set up your Google Authenticator app before continuing. </br><u>You will be unable to login otherwise!</u></p>
                    <div>
                        <a href="/TotpTask/public/complete-registration"><button class="btn btn-primary">Complete Registration</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
