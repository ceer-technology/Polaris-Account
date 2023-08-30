<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     */

    // Synchronously...（向Vue同步数据，在此处定义引用名和指向的laravel数据命令）
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },

            'message' => session('message'),
            'success' => session('success'),
            'error' => session('error'),

            // 获取App信息
            'appLang' => config('app.locale'),
            'appName' => config('app.name'),
            'year' => date('Y'),

            // 第三方登录跳转链接
            'link' => function () {
                return [
                    'Admin' => route('backpack.dashboard'),
                    'UserAgreement' => config('links.UserAgreement'),
                    'PrivacyPolicy' => config('links.PrivacyPolicy'),
                    'UserManual' => config('links.UserManual'),
                    'Feedback' => config('links.Feedback'),
                    'Service' => config('links.Service'),
                ];
            },

            // 第三方登录前端显示按钮
            'socialLoginsEnabled' => config('services.socialLogins.enabled'),

            // 第三方登录选项前端显示按钮
            'logins' => function () {
                return [
                    'qq' => config('services.qq.enabled'),
                    'weixin' => config('services.weixin.enabled'),
                    'github' => config('services.github.enabled'),
                ];
            },

            // 第三方登录跳转链接
            'toRedirect' => function () {
                return [
                    'qq' => config('services.qq.toRedirect'),
                    'weixin' => config('services.weixin.toRedirect'),
                    'github' => config('services.github.toRedirect'),
                ];
            },

            'canResetPassword' => Route::has('password.request'),

            // 用户信息
            'userInformation' => function () use ($request) {
                if (! $user = $request->user()) {
                    return;
                }

                return array_merge($user->toArray(), array_filter([]), [
                    // 角色与权限
                    'admin' => $request->user()->hasanyRole('admin|superAdmin'),
                    'roles' => $request->user() ? $request->user()->roles->pluck('name') : [],
                    'permissions' => $request->user() ? $request->user()->getPermissionsViaRoles()->pluck('name') : [],
                    // 第三方账号
                    'qq' => $user->socials()->where('provider', 'qq')->first(),
                    'wexin' => $user->socials()->where('provider', 'weixin')->first(),
                    'github' => $user->socials()->where('provider', 'github')->first(),
                    'qq_username' => optional($user->socials()->where('provider', 'qq')->first())->provider_username,
                    'wexin_username' => optional($user->socials()->where('provider', 'weixin')->first())->provider_username,
                    'github_username' => optional($user->socials()->where('provider', 'github')->first())->provider_username,
                ]);
            },
        ]);
    }
}
