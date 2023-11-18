<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Regla;

class CrearRegla extends Component
{

    public $temperaturaMax = '';
    public $temperaturaMin = '';

    public $vientoMax = '';
    public $vientoMin = '';

    public $humedadMax = '';
    public $humedadMin = '';

    public $rocioMax = '';
    public $rocioMin = '';


    public function save()
    {
        $this->validate();

        Regla::create(
            $this->only(['temperaturaMax', 'temperaturaMin', 'vientoMax', 'vientoMin', 'humedadMax', 'humedadMin', 'rocioMax', 'rocioMin'])
        );

        return $this->redirect('/crear-regla');
    }

    public function render()
    {
        return view('livewire.crear-regla');
    }
}
