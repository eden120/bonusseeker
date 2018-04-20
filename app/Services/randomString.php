<?php

namespace App\Services;

use Ramsey\Uuid\Uuid;
use function str_random;

class randomString
{
    public static function randString($type = 'nozero', $length = 10)
    {
        switch ($type) {
            case 'allstr':
                $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alpha':
                $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'capital':
                $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                break;
            case 'alphabet':
                $pool = 'abcdefghkmnprstuvwyz';
                break;
            case 'hexdec':
                $pool = '0123456789abcdef';
                break;
            case 'numeric':
                $pool = '0123456789';
                break;
            case 'nozero':
                $pool = '123456789';
                break;
            case 'distinct':
                $pool = '2345679acdefhjklmnprstuvwxyz';
                break;
            default:
                $pool = (string)$type;
                break;
        }

        $crypto_rand_secure = function ($min, $max) {
            $range = $max - $min;
            if ($range < 0) {
                return $min;
            } // not so random...
            $log = log($range, 2);
            $bytes = (int)($log / 8) + 1; // length in bytes
            $bits = (int)$log + 1; // length in bits
            $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
            do {
                $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
                $rnd = $rnd & $filter; // discard irrelevant bits
            } while ($rnd >= $range);

            return $min + $rnd;
        };

        $token = '';
        $max = strlen($pool);
        for ($i = 0; $i < $length; $i++) {
            $token .= $pool[$crypto_rand_secure(0, $max)];
        }

        return $token;
    }

    public static function stringFifty()
    {
        $nozero = randomString::randString('nozero', 10);
        $allstr = randomString::randString('allstr', 6);
        $numeric = randomString::randString('numeric', 6);
        $distinct = randomString::randString('distinct', 8);
        $hexdec = randomString::randString('hexdec', 9);
        $alpha = randomString::randString('alpha', 6);

        return $nozero . '-' . $allstr . "-" . $numeric . '-' . $distinct . '-' . $hexdec . '-' . $alpha;
    }

    public static function stringFourty()
    {
        $nozero = randomString::randString('nozero', 10);
        $distinct = randomString::randString('distinct', 10);
        $alpha = randomString::randString('alpha', 7);

        return $nozero . '-' . $distinct . '-' . time() . '-' . $alpha;
    }

    public static function stringTenDistinct()
    {
        $distinct = randomString::randString('distinct', 10);

        return $distinct;
    }

    public static function stringTwentyTwo()
    {
        $distinct = randomString::randString('distinct', 8);
        $allstr = randomString::randString('allstr', 7);

        return str_random(10) . $distinct . $allstr;
    }

    public static function stringTwelve()
    {
        $alphabet = randomString::randString('alphabet', 2);
        $nozero = randomString::randString('nozero', 10);

        return $alphabet . $nozero;
    }

    public static function stringTen()
    {
        $allstr = randomString::randString('allstr', 10);

        return $allstr;
    }

    public static function stringPermalink()
    {
        $nozero = randomString::randString('nozero', 8);
        $distinct = randomString::randString('distinct', 13);
        $numeric = randomString::randString('numeric', 7);

        return $nozero . '-' . $distinct . '-' . $numeric;
    }

    public static function stringFifteen()
    {
        $nozero = randomString::randString('nozero', 5);
        $allstr = randomString::randString('allstr', 9);

        return $nozero . '-' . $allstr;
    }

    /* End of the Class */

    public static function uuid()
    {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, self::uniqueKey());
    }

    public static function uniqueKey()
    {
        return uniqid(str_random(31), FALSE) . time() . str_random(10);
    }
}