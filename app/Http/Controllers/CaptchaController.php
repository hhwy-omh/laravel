<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
class CaptchaController extends Controller
{
    //
    public function captcha() {

        $captcha = new CaptchaBuilder;
        $captcha->build();


        // 获取验证码ltthh上的内容
        $code = $captcha->getPhrase();

        // 保存到SESSION
        session([
            'captcha'=>$code,
        ]);

        // 显示图片
        return response( $captcha->output() )->header('Content-Type','image/jpeg');

    }
}
