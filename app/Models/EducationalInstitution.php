<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstitution extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'institution_name',
        'faculty',
        'study_program',
        'degree',
        'years_studied',
        'status'
    ];

    public function cv()
    {
        return $this->belongsTo('App\Models\Cv');
    }
}
