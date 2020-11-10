<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags= array(
            array('name' => 'Pet Animals'),
            array('name' => 'Poultry'),
            array('name' => 'Large Animals'),
            array('name' => 'Equiense'),
            array('name' => 'wild Animals')

        );
        DB::table('tags')->insert($tags);
    
    }
}
