<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'category_id' => 1,
            'reference' => 'A000000001',
            'name' => 'Watch',
            'description' => 'Nice watch',
            'image' => 'watch.jpg',
            'price' => 4990,
            'discount' => 10,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
