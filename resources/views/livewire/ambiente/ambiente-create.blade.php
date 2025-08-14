<div class="container mt-5">
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
        <i class="bi bi-person-plus text-green-600"></i>
        Criar Ambiente
    </h1>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="store" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" wire:model.defer="nome"
                class="form-control @error('nome') is-invalid @enderror" />
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">descricao</label>
            <input type="text" id="descricao" wire:model.defer="descricao"
                class="form-control @error('descricao') is-invalid @enderror" />
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <span style="font-size:20px">
                <label for="serie_atual" class="form-label">Serie Atual</label>
                <i class="bi bi-briefcase-fill"></i>
            </span>
            <select class="form-select" aria-label="default-select example"@error('status') is-invalid @enderror
                id="staus" wire:model.defer="status" placeholder="Status">
                <option hidden>Status</option>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
            </select>
            @error('serie_atual')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="{{ route('ambiente.create') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>