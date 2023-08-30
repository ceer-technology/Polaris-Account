<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required', 'string', (new Password)->requireSpecialCharacter(), 'confirmed'];
    }

    // 密码验证器
    // 要求用户输入的密码必须至少 8 位，至少包含一个小写字母，且至少包含一个大写字母，且至少包含一个数字，不包含用户名
    public function requireSpecialCharacter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail',
            'password' => ['bail', 'required', 'min:8', 'case_diff', 'numbers'],
        ]);

        if ($validator->fails()) {
            return $validator->errors()->first();
        }
    }
}
