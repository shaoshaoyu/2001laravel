<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Brand::class, 500)->create()->make();
    }
}
