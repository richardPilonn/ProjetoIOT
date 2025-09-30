<div class="mt-5">


        <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-50">
            <h3 class="card-header d-flex justify-content-center">Excluir sensor
                   <i class="ms-2 bi bi-trash3-fill"></i>
            </h3>
            
            <div class="card-body text-center">
                <p>Tem certeza que deseja excluir o Sensor <strong>{{ $codigo }}</strong>?</p>
                <form wire:submit.prevent="delete">
                    <button type="submit" class="btn btn-danger me-2">Sim, excluir</button>
                    <a href="{{ route('sensors.list') }}" class="btn btn-secondary">Cancelar</a>
                </form>

</div>
</div>
</div>