<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\Form;

Route::get('/', Form::class)->name('products.form');
