<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            ['id' => 1, 'key' => 'store_name', 'value' => config('app.name', 'MyStore'), 'description' => 'Name of the store',
            'name' => 'Name of store','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 2, 'key' => 'store_mail', 'value' => 'hello@mystore.mx', 'description' => 'Email of the store',
            'name' => 'Mail of store','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 3, 'key' => 'store_address', 'value' => '123 CDMX, MX', 'description' => 'Address of the store',
            'name' => 'Address of store','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 4, 'key' => 'store_phone', 'value' => '1234567890', 'description' => 'Phone of the store',
            'name' => 'Phone of store','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 5, 'key' => 'currency_code', 'value' => 'MXN', 'description' => 'Currency',
            'name' => 'Currency of store','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 6, 'key' => 'shipping_cost', 'value' => '200', 'description' => 'Cost of shipping',
            'name' => 'Shipping cost','created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 7, 'key' => 'banner_image', 'value' => 'banner.png', 'description' => 'Banner of home page',
            'name' => 'Banner\'s Home Page', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), ],
        ];

        DB::table('settings')->insert($settings);
    }
}
