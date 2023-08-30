<?php

namespace App\Listeners;

use App\Models\Social;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

// 实现 ShouldQueue 接口
class BindSocialAccount implements ShouldQueue
{
    public function handle(Login $event)
    {
        // 获取 session 中的关联标识符
        $SocialSignIn = session('SocialSignIn');

        if ($SocialSignIn) {
            // 获取 session 中的用户信息
            $socialiteUser = session('social_user');

            if ($socialiteUser) {
                // 使用注入的 Social 模型实例来创建一个新的社交账号并关联到用户
                Social::updateOrCreate([
                    'user_id' => Auth::user()->id,
                    'provider' => $socialiteUser['provider'],
                    'provider_id' => $socialiteUser['provider_id'],
                    'provider_token' => $socialiteUser['provider_token'],
                    'provider_refresh_token' => $socialiteUser['provider_refresh_token'],
                    'provider_username' => $socialiteUser['provider_username'],
                ]);

                return redirect()->route('home')
                    ->with('success', __('auth.Connected'));

                // 清除 session 中的用户信息
                session()->forget('social_user');
            }

            // 清除 session 中的用户信息
            session()->forget('SocialSignIn');
        }
    }
}
