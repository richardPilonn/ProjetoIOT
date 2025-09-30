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
        'ambiente_id' => 'required',
        'codigo' => 'required|unique:sensors,codigo',
        'tipo' => 'required|string|',
        'status' => 'required',
        'descricao' => 'required',
    ];

    protected $messages = [
        'ambiente_id.required' => 'É Necessario o ID do ambiente',
        //'ambiente_id.integer' => 'O campo ID tem que ser do tipo inteiro',

        'codigo.required' => 'É Necessario o codigo',
        'codigo.string' => 'O campo codigo tem q ser um texto Válido',
        'codigo.unique' => 'Este codigo já está cadastrado.',

        'tipo.required' => 'É Necessario o tipo do sensor',
        'tipo.string' => 'O campo tipo tem q ser um texto Válido',

        'descricao.required' => 'A descrição é necessaria',
        'status.required' => 'status é obrigatorio'

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
        $ambientes = Ambiente::all();
        return view('livewire.sensores.sensor-create', compact('ambientes'));
    }
}
