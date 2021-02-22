<?php

namespace App\Models;

use App\Models\Trainee;
use App\Models\Compagny;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Traineeship extends Model
{
    use HasFactory;

    public function trainee()
    {
        $this->belongsTo(Trainee::class);
    }

    public function compagny()
    {
        $this->belongsTo(Compagny::class);
    }
}
