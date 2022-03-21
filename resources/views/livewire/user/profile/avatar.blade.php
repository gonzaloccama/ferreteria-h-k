<div class="card">
    <div class="card-body">

        <div class="d-flex flex-column align-items-center text-center">

            @if($newimage)
                <img src="{{ $newimage->temporaryUrl() }}" alt="Admin"
                     class="rounded-circle" width="150" wire:init="uploadImage">
                {{ $this->uploadImage() }}
            @elseif(isset($user->profile->image) && !empty($user->profile->image))
                <img src="{{ asset('assets/images/profile/').'/'.$user->profile->image }}"
                     alt="{{ $user->firstname }}" class="rounded-circle" width="150">
            @else
                <img src="{{ asset('assets/images/profile/avatar.svg') }}" alt="Admin"
                     class="rounded-circle" width="150">
            @endif

            <label for="image"
                   style="border-radius: 5%;cursor: pointer;position: absolute; margin-left: 200px; color: white; background-color: #0c3253; width: 23px; height: 23px">
                <i class="iconsminds-pen"></i>
            </label>
            <input type="file" id="image" accept="image/jpeg, image/jpg, image/png" hidden wire:model="newimage">

            <div class="mt-3">
                <h4>{{ $user->name }}</h4>
                <p class="text-secondary mb-1">{{ $user->email }}</p>
                <p class="text-muted font-size-sm">{{ $user->profile->mobile }}</p>

                <button class="btn btn-outline-primary">Mensaje</button>
            </div>
        </div>

    </div>
</div>
