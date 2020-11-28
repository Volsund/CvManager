<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email'
    ];
    
    public function path()
    {
        return route('cvs.show', $this);
    }

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function institutions()
    {
        return $this->hasMany('App\Models\EducationalInstitution');
    }

    public function workplaces()
    {
        return $this->hasMany('App\Models\Workplace');
    }
}
