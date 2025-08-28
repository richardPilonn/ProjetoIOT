<div class="mt-5">
    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Sensor
            <i class=" ms-2 bi bi-vector-pen"></i>
        </h3>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="mb-3">
                    <span style="font-size:20px">
                        <label for="codigo" class="form-label">codigo</label>
                        <i class="bi bi-person-fill "></i>
                    </span>
                    <input type="text" id="codigo" wire:model.defer="codigo"
                        class="form-control @error('codigo') is-invalid @enderror" />
                    @error('codigo')
                        <div class="invalid-feedback">{{ $messages }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <span style="font-size:20px">
                        <label for="tipo" class="form-label">tipo</label>
                        <i class="bi bi-person-fill "></i>
                    </span>
                    <input type="text" id="tipo" wire:model.defer="tipo"
                        class="form-control @error('tipo') is-invalid @enderror" />
                    @error('tipo')
                        <div class="invalid-feedback">{{ $messages }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <span style="font-size:20px">
                        <label for="descricao" class="form-label">descricao</label>
                        <i class="bi bi-person-fill "></i>
                    </span>
                    <input type="text" id="descricao" wire:model.defer="descricao"
                        class="form-control @error('descricao') is-invalid @enderror" />
                    @error('descricao')
                        <div class="invalid-feedback">{{ $messages }}</div>
                    @enderror
                </div>



                <div class="mb-3">
                    <span style="font-size:20px">
                        <label for="status" class="form-label">status</label>
                        <i class="bi bi-briefcase-fill"></i>
                    </span>

                    <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                        id="status" wire:model.defer="status" placeholder="Insira Seu status">
                        <option hidden>Selecione Seu status</option>
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $messages }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark w-75 p-3">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
