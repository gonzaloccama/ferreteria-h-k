<div class="card shadow">
    <div class="card-body">

        <div class="row gutters-sm mt-20 mb-20">
            <div class="col-md-4 mb-3">
                @include('livewire.user.profile.avatar')
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <?php
                        $dt = [
                            (object)['title' => 'Nombres', 'data' => $user->name],
                            (object)['title' => 'Correo electrónico', 'data' => $user->email],
                            (object)['title' => 'Celular', 'data' => $user->profile->mobile],
                            (object)['title' => 'Dirección 1', 'data' => $user->profile->line1],
                            (object)['title' => 'Dirección 2', 'data' => $user->profile->line2],
                            (object)['title' => 'Ciudad', 'data' => $user->profile->city],
                            (object)['title' => 'Provincia', 'data' => $user->profile->province],
                            (object)['title' => 'Región', 'data' => $user->profile->region],
                            (object)['title' => 'País', 'data' => $user->profile->country],
                            (object)['title' => 'Código postal', 'data' => $user->profile->zipcode],
                        ];
                        ?>
                        @foreach($dt as $d)
                            <div class="row">
                                <div class="col-sm-3 mt-5">
                                    <h6 class="mb-0">{{ $d->title }}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $d->data }}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn" wire:click.prevent="openEdit">
                                        <i class="fi-rs-edit-alt mr-10"></i> Editar
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

