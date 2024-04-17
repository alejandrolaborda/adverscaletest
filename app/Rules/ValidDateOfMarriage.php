<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class ValidDateOfMarriage implements DataAwareRule, ValidationRule
{
    /**
     * All of the data under validation.
     *
     * @var array<string, mixed>
     */
    protected $data = [];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(boolval($this->data['isMarried']) === false){
            return;            
        }

        if(!checkdate(intval($this->data['dateOfMarriageMonth']), intval($this->data['dateOfMarriageDay']), intval($this->data['dateOfMarriageYear']))){
            $fail('The marriage date provided is invalid.');
        }
       
        $dateOfBirth = Carbon::createFromDate(intval($this->data['dateOfBirthYear']), intval($this->data['dateOfBirthMonth']), intval($this->data['dateOfBirthDay']));
        $dateOfMarriage = Carbon::createFromDate(intval($this->data['dateOfMarriageYear']), intval($this->data['dateOfMarriageMonth']), intval($this->data['dateOfMarriageDay']));

        if($dateOfBirth->diffInYears($dateOfMarriage) < 0){
            $fail('You marriage date cannot be later than your birth date.');
        }

        if($dateOfBirth->diffInYears($dateOfMarriage) < 18){
            $fail('You are not eligible to apply because your marriage occurred before your 18th birthday.');
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;
 
        return $this;
    }
}