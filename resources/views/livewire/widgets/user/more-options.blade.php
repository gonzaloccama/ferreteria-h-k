<div class="card mb-10 shadow">
    <div class="card-body">
        <div class="btn-toolbar nav justify-content-end" role="toolbar" aria-label="Toolbar with button groups">


            <div class="btn-group">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <small style="font-weight: 100; font-size: 10px;">Ordenar</small>
                </button>
                <ul class="dropdown-menu">
                    @foreach($headers as $key => $item)
                        @if(!($key == 'not'))
                            <a class="dropdown-item {{ $orderBy === $key ? 'active-filter' : '' }}"
                               wire:click.prevent="updateOrderBy('{{ $key }}','{{ $sort }}')"
                               href="javascript:;">{{ $item }}</a>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="btn-group ml-5">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <small style="font-weight: 100; font-size: 10px;">Orden</small>
                </button>
                <ul class="dropdown-menu">
                    <a class="dropdown-item {{ $sort==='ASC'?'active-filter':'' }}"
                       wire:click.prevent="updateOrderBy('{{ $orderBy }}','ASC')" href="#">Ascendente</a>
                    <a class="dropdown-item {{ $sort==='DESC'?'active-filter':'' }}"
                       wire:click.prevent="updateOrderBy('{{ $orderBy }}','DESC')" href="#">Descendente</a>
                </ul>
            </div>

            <div class="btn-group ml-5">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <small style="font-weight: 100; font-size: 10px;">Mostrar:  {{ $limit }}</small>
                </button>
                <ul class="dropdown-menu">
                    <?php
                    $sizePages = [4, 8, 16, 32, 64, 128];
                    ?>
                    @foreach($sizePages as $size)
                        <a class="dropdown-item {{ $limit === $size ? 'active-filter' : '' }}" href="#"
                           wire:click.prevent="updatePagination({{ $size }})">{{ $size }}</a>
                    @endforeach
                </ul>
            </div>

            <div class="btn-group ml-5">
                <input placeholder="Buscar..." class="search" wire:model="keyWord">
            </div>


        </div>
    </div>
</div>
