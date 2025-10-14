<?php

namespace App\Livewire\Sensores;

use App\Models\Sensor;
use Livewire\Component;
use Livewire\WithPagination;

class SensorList extends Component
{
    use WithPagination;
    public $search ='';
    public $perPage = 15;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 15],
    ];

    /**
     * Alterna o status (0 ou 1) do Sensor no banco de dados.
     * @param int $sensorId O ID do sensor a ser atualizado.
     */
    public function toggleStatus(int $sensorId)
    {
        // 1. Encontra o sensor pelo ID.
        $sensor = Sensor::findOrFail($sensorId);

        // 2. Inverte o valor da coluna 'status'.
        // Se for 1, vira 0. Se for 0, vira 1.
        $sensor->status = $sensor->status ? 0 : 1;
        
        // 3. Salva a mudança no banco de dados.
        $sensor->save();

        // O Livewire re-renderiza a tabela automaticamente após a chamada.
        session()->flash('message', 'Status do Sensor ' . $sensor->id . ' atualizado para: ' . ($sensor->status ? 'Ativo' : 'Inativo'));
    }

    public function render()
    {
        $sensors = Sensor::where('tipo', 'like', "%{$this->search}%")
        ->orWhere('descricao', 'like', "%{$this->search}%")
        ->orWhere('codigo', 'like', "%{$this->search}%")
        ->orWhere('status', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.sensores.sensor-list', compact('sensors'));
    }
}
