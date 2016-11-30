<?php

use Illuminate\Database\Seeder;

class WishlistPlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlistPlants')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'common_name' => 'Peace Rose',
       'scientific_name' => 'Rosa Madame A. Meilland',
       'description' => 'Beautiful, large, heavy cupped to high centered 6inch blooms (petals 45) of golden primrose-yellow with soft rose-pink shadings on what should be a strong growing continual blooming bush with large, rich-green, leathery foliage. Our plants of Peace will be more winter hardy being own-root and virus free. Makes a good cut flower.',
       'prior_success' => 'This rose did horribly, I wish I could grow it',
       'hardiness' => '5-10',
       'height' => '4-6 ft',
       'bloomtime' => 'early summer',
       'last_grown' => '2014',
       ]);

       DB::table('wishlistPlants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Peony Cheddar Surprise',
           'scientific_name' => 'Paeonia lactiflora "cheddar surprise"',
           'description' => 'Semi-double to double, white peonies with a ring of yellow stamens. The blush buds open to pure white petals. One of the most pleasing fragrances in a peony. Produces superior cut flowers. This beautiful peony plant stands up well and is a favorite with our visitors.',
           'prior_success' => '',
           'hardiness' => '2-8',
           'height' => '30 inches',
           'bloomtime' => 'midbloom mid-late May',
           'last_grown' => '',
       ]);

       DB::table('wishlistPlants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Gladiolus Black Beauty',
           'scientific_name' => 'Gladiolus Grandiflorus',
           'description' => 'With large, deep maroon blooms, Black Beauty makes a romantic statement in the summer garden. Try planting on its own or pairing with a white variety. Stunning! ',
           'prior_success' => '',
           'hardiness' => '8-10',
           'height' => '48-60 inches',
           'bloomtime' => 'late spring - early fall',
           'last_grown' => '',
       ]);
    }
}
