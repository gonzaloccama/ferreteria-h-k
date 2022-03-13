<div class="mb-3 title-page">
    <h1>{{ $_title }}</h1>
    @if(isset($buttons['is_add']) && !empty($buttons['is_add']))
        <div class="text-zero top-right-button-container">
            <button type="button" class="btn btn-primary top-right-button"
                    wire:click.prevent="openModal">
                {{--                    data-toggle="modal"--}}
                {{--                    data-target="#addModal"--}}
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                     stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="16"></line>
                    <line x1="8" y1="12" x2="16" y2="12"></line>
                </svg>
                NUEVO
            </button>
        </div>
    @endif
    @include('livewire.widgets.admin.breadrumb')

</div>
