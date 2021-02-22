<?php

namespace App\Models;

use App\Models\User;
use App\Models\Promo;
use App\Models\Skill;
use App\Models\Traineeship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'promo_id',
    ];

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function traineeships()
    {
        return $this->hasMany(Traineeship::class);
    }
}
