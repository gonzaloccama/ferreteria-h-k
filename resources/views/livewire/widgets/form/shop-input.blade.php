@if(isset($name) && !empty($name))
    <?php
    $req = $required ? '<i class="text-danger required-form fas fa-asterisk"></i>' : '';
    ?>
    <div class="form-floating mb-3">
        <input type="{{ $type }}" class="form-control" id="{{ $name }}" placeholder="{{ $text }}"
               {{ isset($readonly) && !empty($readonly) ? 'readonly' : '' }} wire:model="{{ $name }}">
        <label for="{{ $name }}" class="text-uppercase font-12">
            {{ $text }}{!! $req !!}
        </label>
        @include('livewire.widgets.form.shop-form-error')
    </div>
@endif

