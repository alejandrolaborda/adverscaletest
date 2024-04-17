<?php

use App\Livewire\RegisterComponent;
use App\Livewire\ResultComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', RegisterComponent::class);

Route::get('/result', ResultComponent::class);
