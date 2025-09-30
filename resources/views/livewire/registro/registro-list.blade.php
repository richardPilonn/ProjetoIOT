<div class="container mt-5">
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-3">
        <i class="bi bi-people-fill text-primary"></i>
        Lista de Registros
    </h1>

    @if (session()->has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('message'))
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
                <option value="10000000000000">Todos os Registros</option>
            </select>
        </div>
    </div>


    <table class="table table-striped table-hover align-middle mt-3">
        <thead class="table-primary">
            <tr>
                <th>ID do Sensor</th>
                <th>Valor</th>
                <th>Unidade</th>
                <th>data_hora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($registros as $r)
                <tr>
                    <td>{{ $r->sensor_id }}</td>
                    <td>{{ $r->valor }}</td>
                    <td>{{ $r->unidade }}</td>
                    <td>{{ $r->data_hora }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted fst-italic">Nenhum Registro encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex flex-column align-items-center mt-3">
        <div class="mb-2">
            Mostrando {{ $registros->firstItem() }} até {{ $registros->lastItem() }} de
            {{ $registros->total() }} resultados
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {{-- Link Anterior --}}
                <li class="page-item {{ $registros->onFirstPage() ? 'disabled' : '' }}">
                    <a href="#" class="page-link" wire:click.prevent="previousPage" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                {{-- Links das páginas --}}
                @foreach ($registros->getUrlRange(1, $registros->lastPage()) as $page => $url)
                    <li class="page-item {{ $registros->currentPage() == $page ? 'active' : '' }}">
                        <a href="#" class="page-link"
                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Link Próximo --}}
                <li class="page-item {{ $registros->hasMorePages() ? '' : 'disabled' }}">
                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>


    </div>
</div>
