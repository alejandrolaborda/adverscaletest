<div class="min-h-screen flex flex-col items-center justify-center bg-gray-900">
    <div id="form-wrapper">
        <form wire:submit="save">
            @livewire('partials.register-component.'.$currentStep, ['form' => $form], key($currentStep))
        </form>
    </div>
</div>
