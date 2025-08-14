<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $nome;
    public $descricao;
    public $status;
    public $ambiente;
    public $ambienteId;    
    
    public function mount($id){
        $ambiente = Ambiente::find($id);
        if($ambiente == null){
            session()->flash('error', 'Ambiente não encontrado.');
        } else {
             $this-> ambienteId = $ambiente->id;
             $this-> nome = $ambiente->nome;
             $this -> descricao = $ambiente -> descricao;
             $this -> status = $ambiente -> status;
        }
    }

    public function update() { 
        $this->validade();

        $ambiente = Ambiente::find($this->ambienteId);

        $ambiente->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
        ]);

        session()->flash('message', 'Ambiente Atualizado com Sucesso.');
    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-edit');
    }
}
