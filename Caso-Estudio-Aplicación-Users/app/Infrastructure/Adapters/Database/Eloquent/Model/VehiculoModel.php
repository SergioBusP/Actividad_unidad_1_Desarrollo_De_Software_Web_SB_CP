<?php

namespace Infrastructure\Adapters\Database\Eloquent\VehiculoModel;

use Illuminate\Database\Eloquent\Model;

class VehiculoModel extends Model
{
    protected $table = 'vehiculo';

    protected $fillable = [
        'vehiculoid',
        'numPuertas',
        'numPuestos',
        'color',
        'kilometraje',
        'marca',
        'modelo',
        'cilindraje',
        'combustible',
        'placa'
    ];
}
