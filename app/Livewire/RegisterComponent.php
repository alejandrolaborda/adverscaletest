<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

#[Title('Personal Information Form')]
class RegisterComponent extends Component
{
    public RegisterForm $form;

    public $currentStep = 'step-one';

    private $validSteps = ['step-one', 'step-two'];


    /**
     * Set the current step.
     */
    #[On('set-step')]
    public function setStep($stepName)
    {
        if (in_array($stepName, $this->validSteps)) {
            $this->currentStep = $stepName;
        }
    }

    /**
     * Validate the form data and move to the next step.
     */
    public function save()
    {
        //$this->form->store();

        session()->flash('result-data', [
            'First Name' => $this->form->firstName,
            'Last Name' => $this->form->lastName,
            'Address' => $this->form->address,
            'City' => $this->form->city,
            'Country of Birth' => $this->form->countryOfBirth,
            'Date of Birth' => Carbon::createFromDate($this->form->dateOfBirthYear, $this->form->dateOfBirthMonth, $this->form->dateOfBirthDay)->toFormattedDateString(),
            'Married' => $this->form->isMarried ? 'Yes' : 'No',
            'Date of Marriage' => $this->form->isMarried ? Carbon::createFromDate($this->form->dateOfMarriageYear, $this->form->dateOfMarriageMonth, $this->form->dateOfMarriageDay)->toFormattedDateString() : 'N/A',
            'Country of Marriage' => $this->form->isMarried ? $this->form->countryOfMarriage: 'N/A',
            'Widowed' => $this->form->isMarried ? 'N/A' : ($this->form->isWidowed ? 'Yes' : 'No'),
            'Ever Married' => $this->form->isMarried ? 'N/A' : ($this->form->isEverMarried ? 'Yes' : 'No'),
        ]);

        session()->forget('form-values');

        return redirect()->to('/result');
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.register-component');
    }
}
