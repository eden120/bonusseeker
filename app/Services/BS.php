<?php

namespace App\Services;

use Ramsey\Uuid\Uuid;
use PulkitJalan\GeoIP\GeoIP;

class BS {
    public static function uuid() {
        return Uuid::uuid5(Uuid::NAMESPACE_DNS, uniqid(time() . str_random(), TRUE));
    }

    public static function ipAddress() {
        $geoip = new GeoIP();

        return $geoip->getIp();
    }
}