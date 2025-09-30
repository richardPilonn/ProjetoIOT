<div class="container mt-5">
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
        <i class="bi bi-person-plus text-green-600"></i>
        Criar Sensor
    </h1>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="store" class="needs-validation" >
        <div class="mb-3">
            <span style="font-size:20px">
                <label for="ambientes" class="form-label">ID do Ambiente</label>
                <i class="bi bi-briefcase-fill"></i>
            </span>
            <select class="form-select" aria-label="default-select example" id="ambiente_id" name="ambiente_id"
                wire:model.defer="ambiente_id" placeholder="Ambiente ID">
                <option value="">Selecione Seu Ambiente</option>

                @foreach ($ambientes as $ambiente)
                    <option value="{{ $ambiente->id }}">{{ $ambiente->nome }}</option>
                @endforeach
            </select> 
            @error('ambiente_id')
                <div class="error-field">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <span style="font-size:20px">
                <label for="codigo" class="form-label">Codigo</label>
                <i class="bi bi-person-fill "></i>
            </span>
            <input type="text" id="codigo" name="codigo" wire:model="codigo" class="form-control" />
            @error('codigo')
                <div class="error-field">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <span style="font-size:20px">
                <label for="tipo" class="form-label">Tipo</label>
                <i class="bi bi-person-fill "></i>
            </span>
            <input type="text" id="tipo" wire:model.defer="tipo"
                class="form-control @error('tipo') is-invalid @enderror" />
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <span style="font-size:20px">
                <label for="descricao" class="form-label">Descrição</label>
                <i class="bi bi-person-fill "></i>
            </span>
            <input type="text" id="descricao" wire:model.defer="descricao"
                class="form-control @error('descricao') is-invalid @enderror" />
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
                id="status" wire:model.defer="status" placeholder="Insira Seu status">
                <option hidden>Selecione Seu status</option>
                <option value="0">Inativo</option>
                <option value="1">Ativo</option>
            </select>
            @error('status')
                <div class="error-field">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('sensors.list') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
