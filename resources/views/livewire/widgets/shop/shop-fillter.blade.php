<div class="shop-product-fillter">
    <div class="totall-product">
        {{ $products->links('livewire.widgets.pagination.detail-pagination') }}
    </div>
    <div class="sort-by-product-area">
        <div class="sort-by-cover mr-10">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span><i class="fi-rs-apps"></i>Mostrar:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span> {{ $page_size }} <i class="fi-rs-angle-small-down"></i></span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <?php
                $limitPgs = [3, 6, 12, 24, 48, 96];
                ?>
                <ul>
                    @foreach($limitPgs as $item)
                        <li>
                            <a class="{{ $page_size==$item?'active':'' }}" href="javascript:;"
                               wire:click.prevent="updatePagination({{ $item }})">{{ $item }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sort-by-cover">
            <div class="sort-by-product-wrap">
                <div class="sort-by">
                    <span><i class="fi-rs-apps-sort"></i>Ordenar por:</span>
                </div>
                <div class="sort-by-dropdown-wrap">
                    <span> ... <i class="fi-rs-angle-small-down"></i></span>
                </div>
            </div>
            <div class="sort-by-dropdown">
                <?php
                $filters = [
                    'default' => 'Por defecto',
                    'price' => 'Precio: Baja a Alta',
                    'price-desc' => 'Precio: Alto a Bajo',
                    'date' => 'Precio: Reciente',
                ];
                ?>
                <ul>
                    @foreach($filters as $key => $filter)
                        <li>
                            <a class="{{ $sorting==$key?'active':'' }}"
                               wire:click.prevent="updateSortBy('{{ $key }}')" href="#">{{ $filter }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
