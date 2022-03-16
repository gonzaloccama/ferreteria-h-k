<?php
$icons = [
    'view' => 'iconsminds-duplicate-layer',
    'edit' => 'iconsminds-quill-3',
    'go' => 'iconsminds-right-1',
    'delete' => 'iconsminds-trash-with-men',
    'canceled' => 'iconsminds-remove-basket',
];
$wire = [
    'view' => 'openView(' . $result->id . ')',
    'edit' => 'openEdit(' . $result->id . ')',
    'go' => '',
    'delete' => 'deleteConfirm(' . $result->id . ')',
    'canceled' => 'canceled(' . $result->id . ')',
];
?>

@foreach($actions as $key => $action)
    @if($action && in_array($key, ['canceled','delete']))
        <div class="dropdown-divider "></div>
    @endif

    @if($action)
        <a class="dropdown-item {{ in_array($key, ['delete', 'canceled']) ? 'text-danger' : '' }}" href="#"
           wire:click.prevent="{{ $wire[$key] }}">
            <i class="{{ $icons[$key] }}" style="font-size: 20px;"></i>
            <span>{{ $action }}</span>
        </a>
    @endif
@endforeach
<?php
unset($icons);
unset($wire);
?>


