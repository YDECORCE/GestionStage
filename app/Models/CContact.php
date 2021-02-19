<?php

namespace App\Models;

use App\Models\Compagny;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CContact extends Model
{
    use HasFactory;

    public function compagny()
    {
        return $this->belongsTo(Compagny::class);
    }
}
