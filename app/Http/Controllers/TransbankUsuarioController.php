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

    public function shop(Request $request)
    {
        $categories = Categoria::all();
        $productsByCategory = [];

        foreach ($categories as $categoria) {
            $products = Producto::where('categoria_id', $categoria->id)->get();
            $productsByCategory[$categoria->id] = $products;
        }

        return view('usuario.productos', compact('categories','productsByCategory'));
        // $productos = Producto::all();
        // //dd($products);
        // return view('cliente.productos', compact('productos'));
    }

    public function filterProducts($categoryId)
    {
        $categories = Categoria::all();
        $selectedCategory = Categoria::findOrFail($categoryId);
        $products = Producto::where('categoria_id', $categoryId)->get();

        return view('usuario.filtered-products', compact('categories', 'selectedCategory', 'products'));
    }

    public function iniciar_compra(Request $request)
    {
        $nueva_compra = new Compra();
        //El error mostrado es por temas de apodos, \CartUsuario hace el llamado la libreria de
        $total = \CartUsuario::getTotal() - (\CartUsuario::getTotal() * 0.15); //Total con el descuento aplicado
        $nueva_compra ->session_id = "123456"; // Aqui se almacenara los token de las compras
        $nueva_compra ->total = $total;
        $nueva_compra-> id_cliente = $request->session()->get('loginId');
        $nueva_compra->save();
        $url_to_pay = self::start_web_pay_plus_transaction( $nueva_compra );
        $cartCollection = \CartUsuario::getContent();
        foreach ($cartCollection as $item) {
            $product = Producto::find($item->id); 
            $product->stock -= $item->quantity;
            $product->save();
        }
        return view('usuario.carritoUsuario' ,compact('url_to_pay', 'cartCollection'));
    }

    public function remove(Request $request)
    {
        \CartUsuario::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function add(Request $request)
    {
        \CartUsuario::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Item Agregado a su Carrito!');
    }

    public function update(Request $request)
    {
        \CartUsuario::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->route('cart.index')->with('success_msg', '¡El carrito fue actualizado!');
    }

    public function clear()
    {
        \CartUsuario::clear();
        return redirect()->route('cart.index')->with('success_msg', '¡Todos los productos fueron eliminados!');
    }

    public function start_web_pay_plus_transaction($nueva_compra)
    {
        $transaccion = (new Transaction)->create(
            $nueva_compra->id, //orden de compra
            $nueva_compra->session_id, 
            $nueva_compra->total, //monto
            route('confirmar_pago')
        );
        $id_compra = Compra::select('id')->orderBy('id', 'DESC')->first();
        $session_id = $transaccion->getToken();
        
        if($id_compra){
            DB::update('update compras set session_id = ? where id = ?', [$session_id, $id_compra->id]);

            // DB::insert('insert into compras (id_cliente) values (?)', [$user_id->id]);
        }

        $url = $transaccion->getUrl().'?token_ws='.$transaccion->getToken();
        return $url;
    }

    public function confirmar_pago(Request $request)
    {
        return redirect()->route('home_');
    }
}
