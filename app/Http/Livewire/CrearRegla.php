<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Regla;

class CrearRegla extends Component
{

    public $opcionSeleccionada = false;

    public function render()
    {
        return view('livewire.crear-regla');
    }
}
