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

// Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing');
Route::get('/', function() {
    return redirect()->to('https://nftfactoryparis.com/expositions');
})->name('landing');

Route::get('/100-ai/mint/eTrzAdF', \App\Http\Livewire\Pages\MintCustom1::class)->name('mint-custom1');
Route::get('/100-ai/mint/klDfEzF', \App\Http\Livewire\Pages\MintCustom2::class)->name('mint-custom2');

Route::get('/{expo}', [\App\Http\Controllers\ExpoController::class, 'index'])->name('expo');

Route::get('/{expo}/deploy', \App\Http\Livewire\Pages\Deploy::class)->name('deploy');
Route::get('/{expo}/deploy/{smart_contract}', \App\Http\Livewire\Pages\Deploy::class)->name('continue_deploy');

Route::get('/{expo}/mint/{smart_contract_publicid}', \App\Http\Livewire\Pages\Mint::class)->name('mint');

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
