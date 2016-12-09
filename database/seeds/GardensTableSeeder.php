<?php

use Illuminate\Database\Seeder;

class GardensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gardens')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'name' => 'Flowerbed',
       'location' => 'backyard',
       'description' => 'Where I plant my peonies and other perrenials',
       'created' => '2013',
       'zone' => '5',
       ]);
       DB::table('gardens')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Stone & Water Garden',
      'location' => 'front yard',
      'description' => 'Pond and sparsely planted stone garden',
      'created' => '2016',
      'zone' => '5',
      ]);
    }
}
