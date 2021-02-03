<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* $tags= array(
            array('name:en' => 'Pet Animals'),
            array('name:ar' => 'الحيوانات البرية'),
            array('name:en' => 'Poultry'),
            array('name:ar' => 'الدواجن'),
            array('name:en' => 'Large Animals'),
            array('name:ar' => 'الحيوانات الكبيرة'),
            array('name:en' => 'Equiense'),
            array('name:ar' => 'الخيول'),
            array('name:en' => 'wild Animals'),
            array('name:ar' =>'الحيوانات البرية'),

        );*/
        Tag::create([
            'name:en' => 'Pet Animals',
            'name:ar' => 'الحيونات الأليفة'
          ]);
          Tag::create([
            'name:en' => 'Poultry',
            'name:ar' => 'الدواجن'
        ]);
        Tag::create([
            'name:en' => 'Large Animals',
            'name:ar' => 'الحيوانات الكبيرة'
        ]);
        Tag::create([
            'name:en' => 'Equiense',
            'name:ar' => 'الخيول'
        ]);
        Tag::create([
            'name:en' => 'wild Animals',
            'name:ar' => 'الحيوانات البرية'
        ]);

          /* Tag::createMany([
            [
                'name:en' => 'Pet Animals',
                'name:ar' => 'الحيونات الأليفة'
            ],
            [
                'name:en' => 'Poultry',
                'name:ar' => 'الدواجن'
            ],
            [
                'name:en' => 'Large Animals',
                'name:ar' => 'الحيوانات الكبيرة'
            ],
            [
                'name:en' => 'Equiense',
                'name:ar' => 'الخيول'
            ],
            [
                'name:en' => 'wild Animals',
                'name:ar' => 'الحيوانات البرية'
            ]
        ]);
         */
          
    
    }
}
