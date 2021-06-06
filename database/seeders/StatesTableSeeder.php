<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->delete();

        DB::table('states')->insert([
            [ 'name' => 'Andhra Pradesh' ],
            [ 'name' => 'Arunachal Pradesh' ],
            [ 'name' => 'Assam' ],
            [ 'name' => 'Bihar' ],
            [ 'name' => 'Chhattisgarh' ],
            [ 'name' => 'Goa' ],
            [ 'name' => 'Gujarat' ],
            [ 'name' => 'Haryana' ],
            [ 'name' => 'Himachal Pradesh' ],
            [ 'name' => 'Jharkhand' ],
            [ 'name' => 'Karnataka' ],
            [ 'name' => 'Kerala' ],
            [ 'name' => 'Madhya Pradesh' ],
            [ 'name' => 'Maharashtra' ],
            [ 'name' => 'Manipur' ],
            [ 'name' => 'Meghalaya' ],
            [ 'name' => 'Mizoram' ],
            [ 'name' => 'Nagaland' ],
            [ 'name' => 'Odisha' ],
            [ 'name' => 'Punjab' ],
            [ 'name' => 'Rajasthan' ],
            [ 'name' => 'Sikkim' ],
            [ 'name' => 'Tamil Nadu' ],
            [ 'name' => 'Telangana' ],
            [ 'name' => 'Tripura' ],
            [ 'name' => 'Uttarakhand' ],
            [ 'name' => 'Uttar Pradesh' ],
            [ 'name' => 'West Bengal' ]
        ]);
    }
}
