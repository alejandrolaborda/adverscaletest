<?php

namespace App\Livewire\Partials\RegisterComponent;

use App\Livewire\Forms\RegisterForm;
use App\Livewire\RegisterComponent;
use Livewire\Component;
use Carbon\Carbon;

class StepTwo extends Component
{

    public RegisterForm $form;

    /**
     * Mount the component.
     */
    public function mount($form)
    {
        $this->form = $form;
        $this->form->fill(session('form-values', []));
    }

    /**
     * Go to the previous step.
     */
    public function prevStep() {
        session(['form-values' => $this->form->toArray()]);
        $this->dispatch('set-step', stepName: 'step-one')->to(RegisterComponent::class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.partials.register-component.step-two');
    }
}
