<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{

    public $nome;
    public $descricao;
    public $status;

    public function store()
    {

        if ($this->status !== null) {


            Ambiente::create([
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'status' => $this->status,
            ]);

            session()->flash('message', 'Ambiente criado com sucesso.');
            $this->reset(['nome', 'descricao', 'status']);
        } else {
            // exibir mensagem de erro, pois status tem que ter algum valor
        }
    }


    public function render()
    {
        return view('livewire.ambiente.ambiente-create');
    }
}
