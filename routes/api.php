<?php

use App\Http\Controllers\MlmController;
use Illuminate\Support\Facades\Route;






//MLM
Route::post('addMembers', [MlmController::class, 'addMembers'])->name('addMembers');









?>