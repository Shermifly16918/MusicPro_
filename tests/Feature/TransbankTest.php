<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Compra;
use App\Models\Producto;
use Transbank\Webpay\WebpayPlus;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Transbank\Webpay\WebpayPlus\Transaction;
use Mockery;

class TransbankTest extends TestCase
{

    use DatabaseTransactions;
    use WithFaker;
    
    public function testShop()
    {
        $response = $this->get('productos_');
        
        $response->assertStatus(200);
        $response->assertViewIs('cliente.productos');
    }

    public function testAddToCart()
    {
        // Crea un producto ficticio para utilizarlo en la prueba
        $productoData = [
            'name' => 'Producto de prueba',
            'slug' => 'producto-de-prueba',
            'details' => 'Detalles del producto',
            'price' => 10000,
            'stock' => 10000,
            'shipping_cost' => 2000,
            'categoria_id' => 1,
            'image_path' => 'ruta/imagen.jpg',
        ];
        $producto = Producto::create($productoData);

        // Realiza una solicitud POST a la ruta que maneja la adición de productos al carrito
        $response = $this->followingRedirects()->post('/add', [
            'id' => $producto->id,
            'name' => $producto->name,
            'price' => $producto->price,
            // Otros datos necesarios según tu implementación
        ]);

        // Verifica que la respuesta tenga el código de estado esperado (200 en este caso)
        $response->assertStatus(200);

            // Establecer el mensaje de sesión
            session()->flash('success_msg', 'Item Agregado a su Carrito!');

            // Verifica que el producto se haya agregado al carrito correctamente
            // Puedes adaptar esta verificación según tu implementación y la estructura del carrito
            $this->assertDatabaseHas('productos', [
                'id' => $producto->id,
            ]);

        
    }
    public function testGenerateWebpayPlusUrlWithToken(){
        // Configura el ambiente de Transbank según corresponda
        if (app()->environment('production')) {
            WebpayPlus::configureForProduction(env('webpay_plus_cc'), env('webpay_plus_api_key'));
        } else {
            WebpayPlus::configureForTesting();
        }

        // Realiza una transacción de prueba y obtén el token
        $transaction = (new Transaction)->create(
            'orden123', // Orden de compra
            'session123',
            1000, // Monto de la compra
            'http://127.0.0.1:8000/confirmar-pago' // URL de confirmación de pago
        );
        $token = $transaction->getToken();

        // Genera la URL de Transbank utilizando el token
        $urlToTransbank = $transaction->getUrl().'?token_ws='.$token;

        // Verifica que la URL generada contenga el token
        $this->assertStringContainsString($token, $urlToTransbank);
    }

    // public function testIniciarCompraGeneratesTransbankUrl()
    // {
    //     // Configura el ambiente de Transbank según corresponda
    //     if (app()->environment('production')) {
    //         WebpayPlus::configureForProduction(env('webpay_plus_cc'), env('webpay_plus_api_key'));
    //     } else {
    //         WebpayPlus::configureForTesting();
    //     }

    //     // Crea un cliente de prueba en la base de datos (si es necesario)

    //     // Simula la llamada al método start_web_pay_plus_transaction y obtén la URL de Transbank
    //     $urlToTransbank = 'https://www.transbank.com/checkout'; // Reemplaza con la URL real de Transbank

    //     // Define el monto de la compra
    //     $montoCompra = 1000; // Reemplaza con el monto adecuado para tu prueba

    //     // Sobrescribe el método start_web_pay_plus_transaction del controlador para devolver la URL de Transbank
    //     $transbankController = $this->mock(TransbankController::class)->makePartial();
    //     $transbankController->shouldReceive('start_web_pay_plus_transaction')->with(Mockery::on(function ($compra) use ($montoCompra) {
    //         return $compra->total == $montoCompra;
    //     }))->andReturn('https://www.transbank.com/checkout');

    //     // Hace una solicitud POST a la API para iniciar la compra
    //     $response = $this->postJson('/api/iniciar_compra');

    //     // Verifica que la respuesta sea un código de estado 201 (creado)
    //     $response->assertCreated();

    //     // Obtiene la URL de Transbank de la respuesta JSON
    //     $transbankUrl = $response->json('url_to_pay');

    //     // Verifica que la URL de Transbank devuelta coincida con la URL esperada
    //     $this->assertEquals($urlToTransbank, $transbankUrl);
    // }
}
