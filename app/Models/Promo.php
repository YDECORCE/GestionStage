<?php

namespace App\Models;

use App\Models\Trainee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year',
        'city',
        ];

    public function trainees()
    {
        return $this->hasMany(Trainee::class);
    }    
}
