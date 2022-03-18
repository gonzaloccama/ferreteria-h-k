<div wire:ignore.self class="modal fade" id="viewModal" role="dialog"
     aria-labelledby="viewModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">{{ $contact->name }}</h5>
                <button type="button" wire:click="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @include('livewire.admin.contact.message')

            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-outline-primary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>



