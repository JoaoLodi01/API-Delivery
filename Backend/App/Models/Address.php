<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'cep',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement',
        'reference',
        'active',
    ];
}
