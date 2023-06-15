<?php

use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\MenuGroupController;
use App\Http\Controllers\MenuSectionController;
use App\Http\Controllers\SectionLinkController;
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

    Route::controller(MenuGroupController::class)
        ->prefix('menugroup')
        ->name('menugroup.')
        ->group(function() {
            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/view/{menuGroup}', 'view')->name('view');

            Route::get('/edit/{menuGroup}', 'edit')->name('edit');
            Route::post('/update/{menuGroup}', 'update')->name('update');

            Route::get('/delete/{menuGroup}', 'destroy')->name('destroy');
    });

    Route::controller(MainMenuController::class)
        ->prefix('mainmenu')
        ->name('mainmenu.')
        ->group(function() {
            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/view/{mainMenu}', 'view')->name('view');

            Route::get('/edit/{mainMenu}', 'edit')->name('edit');
            Route::post('/update/{mainMenu}', 'update')->name('update');

            Route::get('/delete/{mainMenu}', 'destroy')->name('destroy');
    });

    Route::controller(MenuSectionController::class)
        ->prefix('menusection')
        ->name('menusection.')
        ->group(function() {

            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/view/{menuSection}', 'view')->name('view');

            Route::get('/edit/{menuSection}', 'edit')->name('edit');
            Route::post('/update/{menuSection}', 'update')->name('update');

            Route::get('/delete/{menuSection}', 'destroy')->name('destroy');
    });

    Route::controller(SectionLinkController::class)
        ->prefix('sectionlink')
        ->name('sectionlink.')
        ->group(function() {

            Route::get('/', 'index')->name('index');

            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');

            Route::get('/view/{sectionLink}', 'view')->name('view');

            Route::get('/edit/{sectionLink}', 'edit')->name('edit');
            Route::post('/update/{sectionLink}', 'update')->name('update');

            Route::get('/delete/{sectionLink}', 'destroy')->name('destroy');
    });

});

require __DIR__.'/auth.php';
