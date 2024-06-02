<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Helpers\MidtransApiHelpers;

class PaymentController extends Controller
{
    public function getToken(Request $request) {
        $penjualan = Penjualan::findOrFail($request->id_penjualan);
        $detail = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();

        // generate request for item_details midtrans
        foreach($detail as $dt){
            $item_details[] = array(
                'id' => $dt->id_penjualan_detail,
                'price' => $dt->subtotal,
                'quantity' => $dt->jumlah,
                'name' => $dt->produk->nama_produk,
            );
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->bayar,
            ),
            'item_details' => $item_details,
            // 'customer_details' => array(
            //     'first_name' => 'budi',
            //     'last_name' => 'pratama',
            //     'email' => 'budi.pra@example.com',
            //     'phone' => '08111222333',
            // ),
        );
        $response = MidtransApiHelpers::getTokenMidtransPayment($params);
        // if($response['status'] != 'success'){
        //     return back()->with('error', 'Gagal !! Terjadi Kesalahan saat request ke API');
        // }
        return response()->json($response);
   
    }
}
