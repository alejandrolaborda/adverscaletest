<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Carbon\Carbon;

class RegisterForm extends Form
{
    // First Page
    #[Validate] 
    public $firstName, $lastName, $address, $city, $countryOfBirth, $dateOfBirthMonth, $dateOfBirthDay, $dateOfBirthYear;

    // Second Page
    #[Validate] 
    public $isMarried, $dateOfMarriageDay, $dateOfMarriageMonth, $dateOfMarriageYear, $countryOfMarriage, $isWidowed, $isEverMarried;

    const COUNTRIES = ['US' => 'United States', 'ES' => 'Spain', 'CA' => 'Canada', 'GB' => 'United Kingdom', 'FR' => 'France', 'DE' => 'Germany', 'IE' => 'Ireland'];
    const MONTHS = [ 1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'];

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
            'dateOfBirthDay' => 'required|integer|between:1,31',
            'dateOfBirthMonth' => 'required|integer|between:1,12',
            'dateOfBirthYear' => 'required|integer|between:1900,'.date('Y'),
            
            'isMarried' => 'required|boolean',
            'dateOfMarriageDay' => 'required_if:isMarried,true|integer|between:1,31',
            'dateOfMarriageMonth' => 'required_if:isMarried,true|integer|between:1,12',
            'dateOfMarriageYear' => 'required_if:isMarried,true|integer|between:1900,'.date('Y'),
            'countryOfMarriage' => 'required_if:isMarried,true|string|size:2',
            'isWidowed' => 'required_if:isMarried,false|boolean',
            'isEverMarried' => 'required_if:isMarried,false|boolean',
        ];
    }

    /**
     * Validate the first page
     */
    public function validateFirstPage()
    {
        $this->validate(array_slice($this->rules(),0,8));
    }

    /**
     * Validate the second page
     */
    public function validateSecondPage()
    {
        $this->validate(array_slice($this->rules(),8));

        //Validate age at marriage. Could also create a custom rule for this.
        $dateOfBirth = Carbon::createFromDate($this->dateOfBirthYear, $this->dateOfBirthMonth, $this->dateOfBirthDay);
        $dateOfMarriage = Carbon::createFromDate($this->dateOfMarriageYear, $this->dateOfMarriageMonth, $this->dateOfMarriageDay);

        if ($this->isMarried && $dateOfMarriage->diffInYears($dateOfBirth) < 18) {
            $this->addError('marriage18', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
            return;
        }
    }  

    /**
     * Store the form
     */
    public function store() 
    {
        $this->validate();

        //Validate age at marriage. Could also create a custom rule for this.
        $dateOfBirth = Carbon::createFromDate($this->dateOfBirthYear, $this->dateOfBirthMonth, $this->dateOfBirthDay);
        $dateOfMarriage = Carbon::createFromDate($this->dateOfMarriageYear, $this->dateOfMarriageMonth, $this->dateOfMarriageDay);

        if ($this->isMarried && $dateOfMarriage->diffInYears($dateOfBirth) < 18) {
            $this->addError('marriage18', 'You are not eligible to apply because your marriage occurred before your 18th birthday.');
            return;
        }
 
        //We could persist here to DB doing something like User::create and utilize the $dateOfBirth and $dateOfMarriage Carbon objects as requested
    }

}
