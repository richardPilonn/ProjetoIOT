<?php

namespace App\Livewire\Sensores;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{

    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

    protected $rules = [
        'ambiente_id' => 'required|integer',
        'codigo' => 'required|string|unique:sensors,codigo',
        'tipo' => 'required|string|',
        'descricao' => 'required|text|',
        'status' => 'boolean',

    ];

    protected $messages = [
        'ambiente_id.required' => 'É Necessario o ID do ambiente',
        'ambiente_id.integer' => 'O campo ID tem que ser do tipo inteiro',

        'codigo,required' => 'É Necessario o codigo',
        'codigo.string' => 'O campo codigo tem q ser um texto Válido',
        'codigo.unique' => 'Este codigo já está cadastrado.',

        'tipo,required' => 'É Necessario o tipo do sensor',
        'tipo.string' => 'O campo tipo tem q ser um texto Válido',

        'descricao.required' => 'A descrição é necessaria',
        'descricao.text' => 'O campo descrição tem q ser um texto Válido',
        
        'status.boolean' => 'Apenas os valores true e false são permitidos.' 
    ];

    public function store()
    {

        $this->validate();

    
        if ($this->status !== null) {
            Sensor::create([
                'ambiente_id' => $this->ambiente_id,
                'codigo' => $this->codigo,
                'tipo' => $this->tipo,
                'descricao' => $this->descricao,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Sensor criado com sucesso.');
            $this->reset(['ambiente_id', 'codigo', 'tipo', 'descricao', 'status']);
        } else {
            session()->flash('error', 'Não foi possivel Criar Sensor.');
        }
    }

    public function render()
    {
        return view('livewire.sensores.sensor-create');
    }
}
