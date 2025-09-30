<div class="mt-5">

    <div class="card mx-auto my-5 shadow-lg p-3 mb-5 bg-white rounded w-75">
        <h3 class="card-header d-flex justify-content-center">Editar Aluno</h3>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome"
                        wire:model.defer="nome" placeholder="Insira o nome">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">descricao</label>
                    <input type="text" class="form-control @error('descricao') is-invalid @enderror" id="descricao"
                        wire:model.defer="descricao" placeholder="Descricao">
                    @error('descricao')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <span style="font-size:20px">
                        <label for="status" class="form-label">Status</label>
                        <i class="bi bi-briefcase-fill"></i>
                    </span>
                    <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                        id="status" wire:model.defer="status" placeholder="Status">
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <option hidden>Status</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <div class="mb-3 d-flex justify-content-center">
                    <button type="update" class="btn btn-dark w-75 p-3">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
