<?php

use App\Http\Controllers\Auth\SocialController;
use Illuminate\Support\Facades\Route;

// 第三方账号
Route::group([
    'prefix' => 'auth',
    'as' => 'auth.',
    'middleware' => 'web',
], function () {
    // 跳转
    Route::get('/{provider}/redirect', [SocialController::class, 'getSocialRedirect'])->name('AuthRedirect');
    // 回调与关联
    Route::get('/{provider}/callback', [SocialController::class, 'handleSocialCallback'])->name('AuthCallback');
    // 解除管理
    Route::get('/{provider}/disconnect', [SocialController::class, 'handleSocialDisconnect'])->name('AuthDisconnect');
    // 账户关联页面
    Route::get('/SocialSignIn', [SocialController::class, 'SocialSignIn'])->name('SocialSignIn');
    // 账户关联注册页面
    Route::get('/SocialwithRegister', [SocialController::class, 'SocialwithRegister'])->name('SocialwithRegister');
    // 账户关联登录页面
    Route::get('/SocialwithLogin', [SocialController::class, 'SocialwithLogin'])->name('SocialwithLogin');
});
