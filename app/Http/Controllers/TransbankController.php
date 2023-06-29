<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Transbank\Webpay\WebpayPlus;
use Transbank\Webpay\WebpayPlus\Transaction;
use Illuminate\Support\Facades\DB;

class TransbankController extends Controller
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

    public function shop(Request $request)
    {
        $categories = Categoria::all();
        $productsByCategory = [];

        foreach ($categories as $categoria) {
            $products = Producto::where('categoria_id', $categoria->id)->get();
            $productsByCategory[$categoria->id] = $products;
        }

        return view('cliente.productos', compact('categories','productsByCategory'));
        // $productos = Producto::all();
        // //dd($products);
        // return view('cliente.productos', compact('productos'));
    }

    public function iniciar_compra(Request $request)
    {
        $nueva_compra = new Compra();
        $total = \CartCliente::getTotal();
        $nueva_compra ->session_id = "123456";
        $nueva_compra ->total = $total;
        $nueva_compra->save();
        $url_to_pay = self::start_web_pay_plus_transaction( $nueva_compra );
        $cartCollection = \CartCliente::getContent();

        foreach ($cartCollection as $item) {
            $product = Producto::find($item->id); // Suponiendo que tienes un modelo llamado "Product" para tus productos
            $product->stock -= $item->quantity;
            $product->save();
        }
        return view('cliente.carritoCliente' ,compact('url_to_pay', 'cartCollection'));
    }

    public function remove(Request $request)
    {
        \CartCliente::remove($request->id);
        return redirect()->route('cart.index_')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        \CartCliente::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index_')->with('success_msg', 'Item Agregado a su Carrito!');
    }

    public function update(Request $request)
    {
        \CartCliente::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->route('cart.index_')->with('success_msg', 'Cart is Updated!');
    }

    public function clear()
    {
        \CartCliente::clear();
        return redirect()->route('cart.index_')->with('success_msg', 'Cart is cleared!');
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
        return $url;
        $id_compra = Compra::select('id')->orderBy('id', 'DESC')->first();
        $session_id = $transaccion->getToken();
        if($id_compra){
            $datos = [
                'cuenta_id' => null, 
            ];
            $modelo = Cliente::create($datos);
            DB::update('update compras set session_id = ? where id = ?', [$session_id, $id_compra->id]);
        }
    }

    public function confirmar_pago(Request $request)
    {
        return redirect()->route('home');
    }
}
