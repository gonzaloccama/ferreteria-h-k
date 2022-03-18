<div class="modal-body">
    <div class="alert alert-primary alert-dismissible fade show rounded mt-0 mb-3" role="alert">
        <strong>FECHA DEL MENSAJE:</strong> <span>
            <?php
            echo ucfirst(Carbon\Carbon::parse($contact->created_at)
                ->locale('es')->translatedFormat('l d \d\e F \d\e\l Y | g:i:s A'));
            ?>
        </span>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="mt-0 mb-3">
        <div class="card border border-light">
            <div class="card-body pt-4 pb-3 d-flex flex-column">
                <div class="text-center">
                    <h5 class="mb-0 font-weight-semibold color-theme-1 mb-4 text-uppercase">{{ $contact->name }}</h5>
                </div>
                <div class="pl-3 pr-3 pt-3 pb-0 d-flex flex-column flex-grow-1">
                    <h5 class="color-theme-1">Correo electrónico</h5>
                    <p class="text-muted mb-4">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </p>
                    <h5 class="color-theme-1">Celular</h5>
                    <p class="text-muted mb-4">
                        <a href="tel:{{ $contact->mobile }}">{{ $contact->mobile }}</a>
                    </p>
                    <h5 class="color-theme-1">Asunto</h5>
                    <p class="text-muted mb-4">
                        <a href="tel:{{ $contact->subject }}">{{ $contact->subject }}</a>
                    </p>
                    <h5 class="color-theme-1">Mensaje</h5>
                    <p class="text-muted mb-4">{{ $contact->message }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
