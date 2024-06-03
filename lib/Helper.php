<?php

namespace Foxdeli\ApiPhpSdk;

class Helper {
    public static function isValidTime(int $time) : bool {
        return $time < time();
    }

    public static function isValidTokenTime(string $token) : bool {
        $decodedToken = json_decode(
            base64_decode(
                str_replace(
                    '_',
                    '/',
                    str_replace(
                        '-',
                        '+',
                        explode('.', $token)[1]
                    )
                )
            )
        );
        return self::isValidTime($decodedToken->exp);
    }
}




