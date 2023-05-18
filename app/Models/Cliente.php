<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Cliente';
    protected $primaryKey = 'id_cliente';
    // public $dverificador = 'd_verificador';

    public $nombres = 'nombres';
    public $apellidos = 'apellidos';
    public $telefono = 'telefono';
    public $direccion = 'direccion';
}
