<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing');

Route::get('/deploy', \App\Http\Livewire\Pages\Deploy::class)->name('deploy');
Route::get('/deploy/{smart_contract_id}', \App\Http\Livewire\Pages\Deploy::class)->name('continue_deploy');

Route::get('/mint/{smart_contract_id}', \App\Http\Livewire\Pages\Mint::class)->name('mint');

// Route::middleware([
//     'auth',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {

//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::middleware(config('fortify.middleware', ['web']))
//     ->prefix('metamask')->group(function () {

//     $limiter = config('fortify.limiters.metamask');

//     Route::get('/ethereum/signature', [\App\Http\Controllers\Web3AuthController::class, 'signature'])
//         ->name('metamask.signature')
//         ->middleware('guest:'.config('fortify.guard'));

//     Route::post('/ethereum/authenticate', [\App\Http\Controllers\Web3AuthController::class, 'authenticate'])
//         ->middleware(array_filter([
//             'guest:'.config('fortify.guard'),
//             $limiter ? 'throttle:'.$limiter : null,
//         ]))->name('metamask.authenticate');
// });
