<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function() {
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

    // Route::group(['prefix' => '/fees'], function() {
    //     Route::get('/', [ App\Http\Controllers\FeesController::class, 'index' ])->name('fees');

    //     Route::get('/create/{user}', [ App\Http\Controllers\FeesController::class, 'create' ])->name('fees.entry');
    //     Route::post('/store/{user}', [ App\Http\Controllers\FeesController::class, 'store' ])->name('fees.store');

    //     Route::get('/edit/{fee}', [ App\Http\Controllers\FeesController::class, 'edit' ])->name('fees.edit');
    //     Route::post('/update/{fee}', [ App\Http\Controllers\FeesController::class, 'update' ])->name('fees.update');

    //     Route::get('/delete/{fee}', [ App\Http\Controllers\FeesController::class, 'destroy' ])->name('fees.destroy');

    // });

    Route::group(['prefix' => '/settings'], function() {
        Route::get('/', [ App\Http\Controllers\SettingsController::class, 'index' ])->name('settings');

        Route::group(['prefix' => '/package'], function() {
            Route::get('/create', [ App\Http\Controllers\PackageController::class, 'create' ])->name('package.create');
            Route::post('/store', [ App\Http\Controllers\PackageController::class, 'store' ])->name('package.store');

            Route::get('/edit/{package}', [ App\Http\Controllers\PackageController::class, 'edit' ])->name('package.edit');
            Route::post('/update/{package}', [ App\Http\Controllers\PackageController::class, 'update' ])->name('package.update');

            Route::get('/delete/{package}', [ App\Http\Controllers\PackageController::class, 'destroy' ])->name('package.destroy');
        });
    });
});

require __DIR__.'/auth.php';
