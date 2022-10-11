<?php

namespace Uniconnect\KitShibboleth;

use Illuminate\Validation\UnauthorizedException;

/**
 *  シングルサインオンを実現するためのメソッドを提供するクラスです。
 */
class Shibboleth
{
    private static $SHBBOLETH_USER_CODE_KEY = 'employeeNumber';

    /**
     * ログインする際に学籍番号or教職員番号を取得する際に使用する
     * @yield [code] ログイン処理などを行うブロック
     */
    public static function loginWithUserCode()
    {
        // TODO need to confirm more at https://uclab.backlog.com/view/KYUTECH_SKG-66#comment-111249297
        // 親サーバーの認証がOKであれば、ユーザーコードが返信されるようになっており、「@controller.request.env[::KitShibboleth::SHBBOLETH_USER_CODE_KEY].presence」で取得が出来ます。
        $code = 'stu001'; // env(self::$SHBBOLETH_USER_CODE_KEY);
        if (!$code) {
            throw new UnauthorizedException('コードが空です。');
        }
        return $code;
    }
}
