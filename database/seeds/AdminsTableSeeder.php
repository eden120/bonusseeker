<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use PulkitJalan\GeoIP\GeoIP;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geoip = new GeoIP();

        DB::table('admins')->insert([
            'name'       => 'BS Admin',
            'email'      => 'bs13579@bonusseeker.com',
            'password'   => bcrypt('hTgzJYD-jV'),
            'ip_address' => $geoip->getIp(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}