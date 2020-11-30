<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'company_name',
        'position',
        'schedule',
        'years_worked',
        'description',
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\Cv');
    }

    public function achievements()
    {
        return $this->hasMany('App\Models\Achievement');
    }
}
