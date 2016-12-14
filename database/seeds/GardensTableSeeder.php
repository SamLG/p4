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
       'zone' => '5a',
       'image' => 'https://s-media-cache-ak0.pinimg.com/originals/fa/57/a5/fa57a5e4a314097ac31ef57db8ca13ba.jpg',
       'user_id' => 3, #attach garden to user
       ]);
       DB::table('gardens')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'name' => 'Stone & Water Garden',
      'location' => 'front yard',
      'description' => 'Pond and sparsely planted stone garden',
      'created' => '2016',
      'zone' => '5a',
      'image' => 'http://teaone.net/uploads/fotos/how-to-design-your-backyard-landscape_989_900_696.jpg',
      'user_id' => 3, #attach garden to user
      ]);
    }
}
