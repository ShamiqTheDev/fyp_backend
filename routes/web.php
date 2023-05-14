<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function() {


    Route::get('routes', function () {
        $routeCollection = Route::getARoutes();

        echo "<table style='width:100%'>";
        echo "<tr>";
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='10%'><h4>Route</h4></td>";
        echo "<td width='10%'><h4>Name</h4></td>";
        echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
            echo "<td>" . $value->methods()[0] . "</td>";
            echo "<td>" . $value->uri() . "</td>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    });


    Route::get('optimize-clear', function() {
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success', 'Application is optimized!');
    })->name('optimize');

    Route::get('/', [ App\Http\Controllers\DashboardController::class, 'index' ])->name('index');
    Route::get('/dashboard', [ App\Http\Controllers\DashboardController::class, 'index' ])->name('dashboard');
    Route::group(['prefix' => '/users'], function() {
        Route::get('/', [ App\Http\Controllers\UsersController::class, 'index' ])->name('users');

        Route::get('/create', [ App\Http\Controllers\UsersController::class, 'create' ])->name('users.register');
        Route::post('/store', [ App\Http\Controllers\UsersController::class, 'store' ])->name('users.store');

        Route::get('/view/{user}', [ App\Http\Controllers\UsersController::class, 'show' ])->name('users.view');

        Route::get('/edit/{user}', [ App\Http\Controllers\UsersController::class, 'edit' ])->name('users.edit');
        Route::post('/update/{user}', [ App\Http\Controllers\UsersController::class, 'update' ])->name('users.update');

        Route::get('/delete/{user}', [ App\Http\Controllers\UsersController::class, 'destroy' ])->name('users.destroy');

    });


    // Route::group(['prefix' => '/settings'], function() {
    //     Route::get('/', [ App\Http\Controllers\SettingsController::class, 'index' ])->name('settings');

    //     Route::group(['prefix' => '/parts'], function() {

    //     });
    // });
});

require __DIR__.'/auth.php';
