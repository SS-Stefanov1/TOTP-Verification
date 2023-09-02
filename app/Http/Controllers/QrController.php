<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
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

        // create a folder
        if (!\File::exists(public_path('images'))) {
            \File::makeDirectory(public_path('images'), $mode = 0777, true, true);
        }

        QrCode::generate($request->qr_message, 'images/' . $time . '.svg');

        $img_url = 'images/' . $time . '.svg';

        \Session::put('qrImage', $img_url);

        return redirect()->route('QRCode.index');
    }
}
