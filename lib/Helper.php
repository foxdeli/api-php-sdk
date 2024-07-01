<?php

namespace Foxdeli\ApiPhpSdk;

class Helper
{
    public static function isValidTime(int $time): bool
    {
        return $time < time();
    }

    public static function isValidTokenTime(string $token): bool
    {
        $baseDecoded = base64_decode(
            str_replace(
                '_',
                '/',
                str_replace(
                    '-',
                    '+',
                    explode('.', $token)[1]
                )
            ),
            true
        );
        if(!$baseDecoded) {
            return false;
        }

        $decodedToken = json_decode($baseDecoded);
        if(!$decodedToken) {
            return false;
        }

        return self::isValidTime($decodedToken->exp);
    }
}




