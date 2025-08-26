<?php

namespace App\Livewire\Sensores;

use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{


    public $ambiente_id;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;


    protected function rules()
    {
        return [
            'ambiente_id' => 'required|integer',
            'codigo' => 'required|string|unique:sensors,codigo',
            'tipo' => 'required|string|',
            'descricao' => 'required|text|',
            'status' => 'boolean',

        ];
    }

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

    public function mount($id)
    {
        $sensor = Sensor::find($id);
        if ($sensor == null) {
            session()->flash('error', 'Sensor Não Encontrado');
            return redirect()->route('Sensor.list');
        } else {
            $this->ambiente_id = $sensor->ambiente_id;
            $this->codigo = $sensor->codigo;
            $this->tipo = $sensor->tipo;
            $this->descricao = $sensor->descricao;
            $this->status = $sensor->status;
        }
    }

    public function update()
    {
        $this->validate();

        $sensor = Sensor::find($this->sensorId);
       

        $sensor->update([
            'codigo' => $this->codigo,
            'tipo' => $this->tipo,
            'descricao' => $this->descricao,
            'status' => $this->status,
        ]);

       

        session()->flash('message', 'Sensor atualizado com sucesso');
        return redirect()->route('Sensor.List');
    }

    public function render()
    {
        return view('livewire.sensores.sensor-edit');
    }
}
