<?php

namespace App\Models;

use App\Models\Promo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainee extends Model
{
    use HasFactory;

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'adress',
        'postalcode',
        'city',
        'phonenumber',
        'email',
        'portfolio',
        'github',
        'cv',
        'mobility',
        'mobilityzone',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }
}
