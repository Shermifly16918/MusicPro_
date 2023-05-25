<?php

namespace App\Http\Controllers;
use App\Models\Compra;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\DB;

class TransbankUsuarioController extends Controller
{
    public function __construct()
    {
        if(app()->environment('production')){
            WebpayPlus::configureForProduction(
                env('webpay_plus_cc'),
                env('webpay_plus_api_key')
            );
        } else {
            WebpayPlus::configureForTesting();
        }
        
    }

    public function iniciar_compra(Request $request)
    {
        $nueva_compra = new Compra();
        $nueva_compra ->session_id = '0';
        $nueva_compra ->total = 123456;
        $nueva_compra->save();
        $url_to_pay = self::start_web_pay_plus_transaction( $nueva_compra );
        return view('usuario.carritoUsuario' ) -> with('url', $url_to_pay);
    }

    public function start_web_pay_plus_transaction($nueva_compra)
    {
        $transaccion = (new Transaction)->create(
            $nueva_compra->id, //orden de compra
            $nueva_compra->session_id,
            $nueva_compra->total, //monto
            route('confirmar_pago')
        );
        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        $id_compra = Compra::select('id')->orderBy('id', 'DESC')->first();
        $session_id = $transaccion->getToken();
        if($id_compra){
            DB::update('update compras set session_id = ? where id = ?', [$session_id, $id_compra->id]);
        }
        

        return $url;
    
    }

    

    public function confirmar_pago(Request $request)
    {
        return $request;
    }
}