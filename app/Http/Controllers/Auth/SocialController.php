<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * 将用户重定向到第三方账号身份验证页面。
     *
     * @param $provider String
     * @return mixed
     */
    public function getSocialRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 从第三方账号处获取用户信息。
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function handleSocialCallback($provider, Request $request)
    {
        try {
            $providerUser = Socialite::driver($provider)->user();

            // First Find Social Account - 首先查找第三方账号是否存在
            $SocialAccount = Social::where([
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ])->first();

            // 获取第三方账号用户名与邮箱
            $name = $providerUser->getNickname() ?? $providerUser->getName();
            $email = $providerUser->getEmail();

            // 检测是否已登录
            if (Auth::check()) {
                // 用户已登录,检测此第三方账号是否已关联
                if ($SocialAccount) {
                    // 用户已登录且此第三方账号已被关联，则查找此用户是否已关联此第三方账号提供商
                    $userProvider = Auth::user()->socials()->where([
                        'provider' => $provider,
                    ])->first();

                    if ($userProvider) {
                        // 此用户已关联此第三方账号提供商,则跳转回第三方账号关联管理页面并附带错误提示“请勿重复关联此第三方账号”
                        return redirect()->route('profile.thirdPartyAccount')
                            ->with('error', __('auth.Please do not connect this third-party account more than once'));
                    } else {
                        // 此用户未关联此第三方账号提供商且其他用户已关联此第三方账号,则跳转回第三方账号关联管理页面并附带错误提示“此第三方账号已关联其他账户”
                        return redirect()->route('profile.thirdPartyAccount')
                            ->with('error', __('auth.This third-party account has been connected to another account'));
                    }
                } else {
                    // 用户已登录且此第三方账号未被关联，则将此第三方账号关联到此用户账户
                    $userID = Auth::user()->id;

                    Social::updateOrCreate([
                        'user_id' => $userID,
                        'provider' => $provider,
                        'provider_id' => $providerUser->getId(),
                        'provider_token' => $providerUser->token,
                        'provider_refresh_token' => $providerUser->refreshToken,
                        'provider_username' => $name,
                    ]);
                }
            } else {
                // 用户未登录,检测此第三方账号是否已关联
                if ($SocialAccount) {
                    // 用户未登录且此第三方账号已被关联，获取关联此第三方账号的用户并登录
                    $user = $this->findOrUpdateUser($provider, $providerUser);
                    Auth::login($user, true);
                } else {
                    // 用户未登录且此第三方账号未被关联，则将第三方账号信息保存到 session 中，并跳转到账户关联页面
                    session(['social_user' => [
                        'provider' => $provider,
                        'provider_id' => $providerUser->getId(),
                        'provider_token' => $providerUser->token,
                        'provider_refresh_token' => $providerUser->refreshToken,
                        'provider_username' => $name,
                        'provider_email' => $email,
                    ]]);

                    return redirect()->route('auth.SocialSignIn');
                }
            }
        } catch (\Throwable|\Exception $e) {
            // 在开发中发送实际错误消息
            if (config('app.debug')) {
                throw $e;
            }
            // 让我们抑制此错误
            return redirect()->route('login')
                ->with('error', __('auth.Unable to authenticate, Please try again.'));
        }

        // 此会话变量可以帮助确定用户是否通过第三方账号登录
        session()->put([
            'auth.social_id' => $providerUser->getId(),
        ]);

        return $this->authenticated($user)
            ?: redirect()->intended($this->redirectTo());
    }

    /**
     * 解除第三方账号关联
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function handleSocialDisconnect($provider, Request $request)
    {
        Social::where('provider', $provider)->first()->delete();

        return redirect()->route('profile.thirdPartyAccount');
    }

    /**
     * 账户关联页面
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function SocialSignIn()
    {
        return Inertia::render('Auth/SocialSignIn');
    }

    /**
     * 账户关联注册页面
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function SocialwithRegister(Request $request)
    {
        // 在 session 中写入关联标识符 - 注册
        session(['SocialSignIn' => [
            'type' => 'SocialwithRegister',
        ]]);

        // 获取 session 中的用户信息
        $socialiteUser = session('social_user');

        return Inertia::render('Auth/SocialwithRegister', [
            'provider_username' => $socialiteUser['provider_username'],
            'provider_email' => $socialiteUser['provider_email'],
        ]);
    }

    /**
     * 账户关联登录页面
     *
     * @param $provider string
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Exception
     * @throws \Throwable
     */
    public function SocialwithLogin()
    {
        // 在 session 中写入关联标识符 - 登录
        session(['SocialSignIn' => [
            'type' => 'SocialwithLogin',
        ]]);

        // 跳转到登录账户页面
        return Inertia::render('Auth/SocialwithLogin');
    }

    /**
     * 查找或更新用户
     *
     * @param $providerName string
     * @return mixed
     */
    protected function findOrUpdateUser($providerName, $providerUser)
    {
        $social = Social::firstOrNew([
            'provider_id' => $providerUser->getId(),
            'provider' => $providerName,
        ]);

        if ($social->exists) {
            return $social->user;
        }

        $user = User::firstOrNew([
            'email' => $providerUser->getEmail(),
        ]);

        $social->user()->associate($user);
        $social->save();

        return $user;
    }

    /**
     * 第三方关联事件
     *
     * @return mixed
     */
    protected function authenticated(User $user)
    {
    }

    /**
     * 登录后重定向用户的位置。
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('home');
    }
}
