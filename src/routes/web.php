<?php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostCrud;

 Route::get('/', PostCrud::class);



Route::get('/test', function () {
    return "hello what are you doing?";
});