<?php

namespace App\Livewire\Forms;

use App\Rules\ValidDateOfBirth;
use App\Rules\ValidDateOfMarriage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    const ERROR_MESSAGES = [
        'isMarried' => 'You must indicate if you are married.',
        'countryOfBirth' => 'The country of origin field is required.',
        'countryOfMarriage' => 'The country of marriage field is required.',
        'isWidowed' => 'You must indicate if you are widowed.',
        'isEverMarried' => 'You must indicate if you have you ever been married in the past.',
    ];

    // First Page
    #[Validate] 
    public $firstName, $lastName, $address, $city, $countryOfBirth, $dateOfBirthMonth, $dateOfBirthDay, $dateOfBirthYear, $dateOfBirth;

    // Second Page
    #[Validate] 
    public $isMarried, $dateOfMarriageDay, $dateOfMarriageMonth, $dateOfMarriageYear, $dateOfMarriage, $countryOfMarriage, $isWidowed, $isEverMarried;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'firstName' => 'required|string|between:1,255',
            'lastName' => 'required|string|between:1,255',
            'address' => 'required|string|between:1,255',
            'city' => 'required|string|between:1,255',
            'countryOfBirth' => 'required|string|size:2',
            'dateOfBirth' => new ValidDateOfBirth,
            
            'isMarried' => 'required|boolean',
            'dateOfMarriage' => new ValidDateOfMarriage,
            'countryOfMarriage' => 'required_if_accepted:isMarried|string|size:2|nullable',
            'isWidowed' => 'nullable|required_if_declined:isMarried|boolean',
            'isEverMarried' => 'nullable|required_if_declined:isMarried|boolean',
        ];
    }

    /**
     * Validate the first page
     */
    public function validateFirstPage()
    {
        $this->validate(array_slice($this->rules(),0,6), self::ERROR_MESSAGES);
    }

    /**
     * Validate the second page
     */
    public function validateSecondPage()
    {
        $this->validate(array_slice($this->rules(),6), self::ERROR_MESSAGES); 
    }  

    /**
     * Store the form
     */
    public function store() 
    { 
        //We could persist here to DB doing something like User::create and utilize the $dateOfBirth and $dateOfMarriage Carbon objects as requested
    }

}
