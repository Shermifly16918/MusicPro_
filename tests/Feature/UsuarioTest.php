<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Cuenta;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioTest extends TestCase
{
   use DatabaseTransactions;

   private $cuenta; // Variable para almacenar los datos de la cuenta de registro
   protected $registroForm;
    public function setUp(): void
    {
        parent::setUp();

        // // Verificar si la cuenta de registro ya existe
        // $this->cuenta = Cuenta::where('email', 'test@test.com')->first();

        // // Si no existe, crear la cuenta de registro
        // if (!$this->cuenta) {
        //     $contrasena = Hash::make('Password1');
        //     $this->cuenta = Cuenta::factory()->create([
        //         'usuario' => 'duoc',
        //         'nombres' => 'duoc',
        //         'apellidos' => 'duoc',
        //         'email' => 'test@test.com',
        //         'contrasena' => $contrasena,
        //     ]);
        // }
        // Registro Correcto
        $this->registroForm = [
            'usuario' => 'duoc',
            'nombres' => 'duoc',
            'apellidos' => 'duoc',
            'email' => 'test@test.com',
            'contrasena' => 'Password1',
        ];
    }

   
   public function test_registro(){
        //Esta funcion ayuda que al momento de ejecutar el test, se ejecute tambien la funcion migrate, para hacer la comprobacion de datos en la base de datos.
        Artisan::call('migrate');

        //AssertRedirect = verifica que redirige a tal direccion
        //AssertStatus = verifica que la solicitud entrega el estatus
        //correspondiente, como lo puede ser 200, que significa que la
        //pagina carga correctamente.
        //AssertSessionHasErrors = Valida que los datos ingresados sean incorrectos.
        //AssertDatabaseHas = Comprueba que los datos solicitados se encuentren en la base de datos.
        //AssertSee = especifica al test que debe de estar en la pagina Registro(Con el titulo Registro)

        //El formulario carga correctamente
        $carga = $this->get(route('registro'));
        $carga->assertStatus(200)->assertSee('Registro');

        //Registro Incorrecto
        $registroMal = $this->post(route('registro-usuario'), ["email"=>"aaa", "contrasena"=>"123"]);
        $registroMal->assertStatus(302)->assertRedirect(route('registro'))
        ->assertSessionHasErrors([
            'email'=>__('validation.email', ['attribute'=> 'email']),
            'contrasena'=>__('validation.min.string', ['attribute'=> 'contrasena', 'min'=>5]),
        ]);

        

        $registroBien = $this->post(route('registro-usuario'), $this->registroForm);
        $registroBien->assertStatus(302)->assertRedirect(route('login'));

        // Verificar que el formulario de registro redirige a la página de inicio de sesión
        $this->assertGuest(); // Verificar que no hay ningún usuario autenticado
        $loginPage = $this->get(route('login'));
        $loginPage->assertStatus(200)->assertSee('Login');

        
   }

   public function test_login()
    {

        //El formulario carga correctamente
        $carga = $this->get(route('login'));
        $carga->assertStatus(200)->assertSee('Login');

        // Simular la solicitud de inicio de sesión con los datos de registro
        $login = $this->post(route('login-user'), [
            'email' => $this->registroForm['email'],
            'contrasena' => $this->registroForm['contrasena'],
        ]);

    }

   

}
