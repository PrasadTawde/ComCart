<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            [ 'name' => 'Electronics', 'icon' => 'fas fa-tv' ],
            [ 'name' => 'Women\'s Clothing', 'icon' => 'fas fa-female' ],
            [ 'name' => 'Mens\'s Clothing', 'icon' => 'fas fa-male' ],
            [ 'name' => 'Furniture & Decor', 'icon' => 'fas fa-couch' ],
            [ 'name' => 'Sports, Books & More', 'icon' => 'fas fa-football-ball' ],
            [ 'name' => 'Beauty & Health', 'icon' => 'fas fa-heartbeat' ]
        ]);
    }
}
