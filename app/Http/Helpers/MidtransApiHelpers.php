<?php

namespace App\Helpers;

class MidtransApiHelpers {
    public static function getTokenMidtransPayment($data){
        
    
        try {
           // Set your Merchant Server Key
            // \Midtrans\Config::$serverKey = env('MIDTRANS_CLIENT_KEY');
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
        
            $params = $data;

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $token = response($snapToken)->content();
            return ['status' => 'success', 'token' => $token];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }

    }
}

?>