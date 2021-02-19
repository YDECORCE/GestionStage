<?php

namespace App\Models;

use App\Models\CContact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compagny extends Model
{
    use HasFactory;

    public function c_contacts()
    {
        return $this->hasMany(CContact::class);
    }    
}