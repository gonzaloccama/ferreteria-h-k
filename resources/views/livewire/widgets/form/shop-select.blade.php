@if(isset($name) && !empty($name))
    <?php
    $req = $required ? '<i class="text-danger required-form fas fa-asterisk"></i>' : '';
    ?>
    <div class="form-group">
        <div class="custom_select">
            <select class="form-control" id="{{ $name }}" wire:model="{{ $name }}" style="width: 100% !important;">
                <option value="" style="color: grey;">
                    {{ mb_convert_case($text, MB_CASE_UPPER, "UTF-8") }}...
                </option>
                @if($type == 'obj')
                    @foreach($options as $option)
                        <option value="{{ $option->id }}">{{ $option->region }}</option>
                    @endforeach
                @elseif($type == 'list')
                    @foreach($options as $key => $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        @include('livewire.widgets.form.shop-form-error')
    </div>
@endif
