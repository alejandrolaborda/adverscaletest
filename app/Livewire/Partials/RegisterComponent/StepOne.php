<?php

namespace App\Livewire\Partials\RegisterComponent;

use App\Livewire\Forms\RegisterForm;
use App\Livewire\RegisterComponent;
use Livewire\Component;

class StepOne extends Component
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
     *  Go to the next step.
     */
    public function nextStep()
    {
        $this->form->validateFirstPage();
        session(['form-values' => $this->form->toArray()]);
        $this->dispatch('set-step', stepName: 'step-two')->to(RegisterComponent::class);
    }

    /**
     * Reset the form.
     */
    public function resetForm()
    {
        session()->forget('form-values');
        $this->form->reset();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.partials.register-component.step-one');
    }
}
