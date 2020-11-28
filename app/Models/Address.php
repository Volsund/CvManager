<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'city',
        'address',
        'apartment',
        'postal_code'
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\Cv');
    }
}
