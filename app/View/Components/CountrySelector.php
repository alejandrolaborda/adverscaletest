<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountrySelector extends Component
{
    //If this wasn't just a demo I would have used an Algolia search field to get the full countries list and search/autocomplete functionality ;)
    const COUNTRIES = ['US' => 'United States', 'ES' => 'Spain', 'CA' => 'Canada', 'GB' => 'United Kingdom', 'FR' => 'France', 'DE' => 'Germany', 'IE' => 'Ireland'];

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.country-selector')->with('countries', self::COUNTRIES);
    }
}
