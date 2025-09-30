<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $temperatura;
    public $umidade;
    public $luminosidade;
    public $ultimoRegistro;

    public $labelsTemperatura = [];
    public $dadosTemperatura = [];

    public $labelsSensores = [];
    public $dadosSensores = [];

    public function mount(){
        $this->carregarDados();
    }

    public function carregarDados(){
        
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
