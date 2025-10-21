<div class="container mt-5">
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
        <i class="bi bi-people-fill text-primary"></i>
        Lista de Sensores
    </h1>
    <div class="d-flex flex-row justify-content-end">
        <a href="{{ route('sensors.create') }}" class="btn btn-outline-primary mb-3 btn-sm"
            style="border-radius: 0.25rem; height: 38px; padding-top: 6px; min-width: 140px;">
            <i class="bi bi-person-add"></i> Novo Sensor
        </a>
    </div>
    @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('message'))
        {{-- MENSAGEM DO TOGGLE APARECE AQUI --}}
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="d-flex flex-row justify-content-start">

        <input type="text" class="form-control flex-item justify-content-start" id="search"
            placeholder="Buscar sensores..." wire:model.live="search" />
        <div class="flex-item col-md-3 ms-2">
            <select wire:model.live="perPage" class="form-select" style="border-color: #ced4da;">
                <option value="15">15 por página</option>
                <option value="30">30 por página</option>
                <option value="45">45 por página</option>
                <option value="100">100 por página</option>
                <option value="10000000000000">Todos os Usuarios</option>
            </select>
        </div>
    </div>


    <table class="table table-striped table-hover align-middle mt-3">
        <thead class="table-primary">
            <tr>
                <th>ID do sensor</th>
                <th>AmbienteID</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Codigo</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sensors as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->ambiente->id }}</td>
                    <td>{{ $s->tipo }}</td>
                    <td>{{ $s->descricao }}</td>
                    <td>{{ $s->codigo }}</td>
                    <td>
                        <div class="form-check form-switch d-flex align-items-center m-8">
                            <input class="form-check-input" type="checkbox" role="switch"
                                id="sensorSwitch{{ $s->id }}" wire:click="toggleStatus({{ $s->id }})"
                                {{ $s->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="sensorSwitch{{ $s->id }}">
                                {{ $s->status == 1 ? 'Ativo' : 'Inativo' }}
                            </label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('sensors.edit', $s->id) }}" class="btn btn-sm btn-warning" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('sensors.delete', $s->id) }}" class="btn btn-sm btn-danger" title="Excluir">
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted fst-italic">Nenhum Sensor encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex flex-column align-items-center mt-3">
        <div class="mb-2">
            Mostrando {{ $sensors->firstItem() }} até {{ $sensors->lastItem() }} de
            {{ $sensors->total() }} resultados
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{-- Link Anterior --}}
                <li class="page-item {{ $sensors->onFirstPage() ? 'disabled' : '' }}">
                    <a href="#" class="page-link" wire:click.prevent="previousPage" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                {{-- Links das páginas --}}
                @foreach ($sensors->getUrlRange(1, $sensors->lastPage()) as $page => $url)
                    <li class="page-item {{ $sensors->currentPage() == $page ? 'active' : '' }}">
                        <a href="#" class="page-link"
                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Link Próximo --}}
                <li class="page-item {{ $sensors->hasMorePages() ? '' : 'disabled' }}">
                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</div>
