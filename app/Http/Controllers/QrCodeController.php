<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{

    /**
     * QR code view.
     *
     * @return void
     */
    public function index()
    {
        return view('qrCode');
    }

    /**
     * Generate Qr code.
     *
     * @return void
     */
    public function generate(Request $request)
    {
        $time = time();
        $google2fa = app('pragmarx.google2fa');
        $qr_key = $google2fa->generateSecretKey();
        $qr_user = "test@abv.bg";

        $qr_image = $google2fa->getQRCodeInline(
            config('app.name'),
            $qr_user,
            $qr_key,
        );

        if (!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }

        QrCode::generate($request->qr_message, 'images/' . $time . '.svg');

        $img_url = 'images/' . $time . '.svg';

        \Session::put('qrImage', $img_url);

        //return (var_dump($qr_user, $qr_key));
        return redirect()->route('QrCode.index');
    }
}
