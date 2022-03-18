@if(isset($name) && !empty($name))
    <?php
    $req = $required ? '<i class="text-danger required-form fas fa-asterisk"></i>' : '';
    ?>
    <div class="form-floating mb-3">
        <textarea class="form-control" id="{{ $name }}" placeholder="{{ $text }}" style="height: 150px;"
                  wire:model="{{ $name }}"></textarea>
        <label for="{{ $name }}" class="text-uppercase font-12">
            {{ $text }}{!! $req !!}
        </label>
        @include('livewire.widgets.form.shop-form-error')
    </div>
@endif

