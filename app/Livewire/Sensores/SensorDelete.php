<?php

namespace App\Livewire\Sensores;

use App\Models\Sensor;
use Livewire\Component;

class SensorDelete extends Component
{

    public $sensorId;
    public $ambiente_id;
    public $codigo;
    public $status;

    public function mount($id)
    {

        $sensor = Sensor::find($id);
        if ($sensor == null) {
            session()->flash('error', 'Sensor Não Encontrado');
            return redirect()->route('sensors.list');
        } else {
            $this->sensorId = $sensor->id;
            $this->ambiente_id = $sensor->ambiente_id;
            $this->codigo = $sensor->codigo;
            $this->status = $sensor->status;
        }
    }


    public function delete()
    {
        $sensor = Sensor::find($this->sensorId);
        

        $sensor->delete();

       
        session()->flash('message', 'Sensor excluído com sucesso');
        return redirect()->route('sensors.list');
    }

    public function render()
    {
        return view('livewire.sensores.sensor-delete');
    }
}
