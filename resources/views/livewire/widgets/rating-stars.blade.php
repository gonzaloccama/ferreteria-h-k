<div class="rating-stars">
    <div class="star-icon">
        {{--        {{ $star == $rating ? 'checked' : '' }}--}}
        @for($star = 1; $star < 6; $star++)
            <input type="radio" name="rating" id="rating{{ $star }}" wire:model="rating"
                   value="{{ $star }}" {{ $star == $rating ? 'checked' : '' }}>
            <label for="rating{{ $star }}" class="simple-icon-star"></label>
        @endfor
    </div>
    @include('livewire.widgets.form.shop-form-error')
</div>
