<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backpack\LogManager Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\LogManager package.
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers\Backpack\LogManager',
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'prefix' => config('backpack.base.route_prefix', 'admin'),
], function () {
    Route::get('log', 'LogController@index')->name('log.index');
    Route::get('log/preview/{file_name}', 'LogController@preview')->name('log.show');
    Route::get('log/download/{file_name}', 'LogController@download')->name('log.download');
    Route::delete('log/delete/{file_name}', 'LogController@delete')->name('log.destroy');
});
