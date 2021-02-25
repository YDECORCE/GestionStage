<?php

namespace App\Http\Livewire;

use App\Models\Trainee;
use Livewire\Component;

class DashboardAdminFilter extends Component
{
    public $promos;
    public $promofilter = [];

    public function render()
    {
        $this->promofilter = array_filter($this->promofilter, function($val){
            return $val !== false;
        });

        if(empty($this->promofilter)){
            $trainees = Trainee::join('promos', 'trainees.promo_id', '=', 'promos.id')
                    ->where('promos.active', true)
                    ->select('trainees.*')
                    ->orderBy('name', 'asc')
                    ->get();
        }
        else{
        $trainees = Trainee::join('promos', 'trainees.promo_id', '=', 'promos.id')
                        ->where('promos.active', true)
                        ->whereIn('promos.id', array_keys($this->promofilter))
                        ->select('trainees.*')
                        ->orderBy('name', 'asc')
                        ->get();
        }
        return view('livewire.dashboard-admin-filter',[
            'trainees' => $trainees,
        ]);
    }
}
