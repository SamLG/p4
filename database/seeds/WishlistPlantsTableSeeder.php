<?php

use Illuminate\Database\Seeder;

class WishlistplantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlistplants')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'common_name' => 'Peace Rose',
       'scientific_name' => 'Rosa Madame A. Meilland',
       'description' => 'Beautiful, large, heavy cupped to high centered 6inch blooms (petals 45) of golden primrose-yellow with soft rose-pink shadings on what should be a strong growing continual blooming bush with large, rich-green, leathery foliage. Our plants of Peace will be more winter hardy being own-root and virus free. Makes a good cut flower.',
       'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Rose.A.Mailend1.jpg/220px-Rose.A.Mailend1.jpg',
       'prior_success' => 'This rose did horribly, I wish I could grow it',
       'min_zone' => '5a',
       'max_zone' => '10b',
       'height' => '4-6 ft',
       'bloomtime' => 'early summer',
       'last_grown' => '2014',
       ]);

       DB::table('wishlistplants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Peony Cheddar Surprise',
           'scientific_name' => 'Paeonia lactiflora "cheddar surprise"',
           'description' => 'Semi-double to double, white peonies with a ring of yellow stamens. The blush buds open to pure white petals. One of the most pleasing fragrances in a peony. Produces superior cut flowers. This beautiful peony plant stands up well and is a favorite with our visitors.',
           'image' => 'http://www.songsparrow.com/images-plants/highres/5PEOCHDC.jpg',
           'prior_success' => '',
           'min_zone' => '2a',
           'max_zone' => '8b',
           'height' => '30 inches',
           'bloomtime' => 'midbloom mid-late May',
           'last_grown' => '',
       ]);

       DB::table('wishlistplants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Gladiolus Black Beauty',
           'scientific_name' => 'Gladiolus Grandiflorus',
           'description' => 'With large, deep maroon blooms, Black Beauty makes a romantic statement in the summer garden. Try planting on its own or pairing with a white variety. Stunning! ',
           'image' => 'http://media.americanmeadows.com/media/catalog/product/cache/1/image/500x/2664a1c26d20ff89f08769f165108d16/g/l/gladiolusblackbeauty.jpg',
           'prior_success' => '',
           'min_zone' => '8a',
           'max_zone' => '10b',
           'height' => '48-60 inches',
           'bloomtime' => 'late spring - early fall',
           'last_grown' => '',
       ]);
    }
}
