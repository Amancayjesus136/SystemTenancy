<?php

declare(strict_types=1);

use App\Http\Controllers\Income\IngresosController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('tenancy.welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('tenancy.dashboard');
        })->name('dashboard');

        Route::resource('ingresos', IngresosController::class);

    });

    require __DIR__.'/tenancy_auth.php';
});

