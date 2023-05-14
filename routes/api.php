<?php

use App\Http\Controllers\ExpiriesController;
use App\Http\Controllers\PartsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Login Registeration routes
Route::post('/auth/register', [ AuthController::class, 'registerUser' ]);
Route::post('/auth/login', [ AuthController::class, 'loginUser' ]);
// END: Login Registeration routes

// Sanctum protected routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('routes', function () {
        $routeCollection = Route::getRoutes();

        echo "<table style='width:100%'>";
        echo "<tr>";
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='10%'><h4>Route</h4></td>";
        echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            if(str_contains($value->uri(), 'api')) {
                echo "<tr>";
                    echo "<td>" . $value->methods()[0] . "</td>";
                    echo "<td>" . $value->uri() . "</td>";
                    echo "<td>" . $value->getActionName() . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    });

    Route::controller(PartsController::class)
        ->prefix('parts')
        ->group(function() {
            Route::post('/create', 'create');
            Route::get('/getAll', 'getAll');
            Route::post('/update/{part}', 'update');
            Route::get('/getById/{part}', 'get');
            Route::get('/delete/{part}', 'destroy');
    });

    Route::controller(ExpiriesController::class)
        ->prefix('expiries')
        ->group(function() {
            Route::post('/create', 'create');
            Route::get('/getAll', 'getAll');
            Route::post('/update/{expiry}', 'update');
            Route::get('/getById/{expiry}', 'get');
            Route::get('/delete/{expiry}', 'destroy');
    });
});
// END: Sanctum protected routes



