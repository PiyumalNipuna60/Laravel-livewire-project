<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\Index;
use App\Livewire\Products\Form;

Route::get('/', Index::class)->name('products.index');
Route::get('/products/create', Form::class)->name('products.create');
Route::get('/products/{productId}/edit', Form::class)->name('products.edit');
