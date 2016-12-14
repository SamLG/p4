<?php

use Illuminate\Database\Seeder;

// don't have to include use DB use Carbon, because it is in the global namespace

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Peony Rasberry Sorbet',
           'scientific_name' => 'Paeonia lactiflora "sorbet"',
           'description' => 'With luscious double flowers in cool shades of pink and cream, Peony Sorbet looks good enough to eat! A real showstopper.',
           'image' => 'https://s-media-cache-ak0.pinimg.com/736x/08/31/2a/08312a8a2bd735d42e4fd9fb58bebcc9.jpg',
           'success' => 'This peony is hardy and comes up every year',
           'min_zone' => '3a',
           'max_zone' => '8b',
           'height' => '28-46 inches',
           'bloomtime' => 'late spring - early summer',
           'planted' => 'Spring 2015',
           'location' => 3,
       ]);

       DB::table('plants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Hardy Chrysanthemum',
           'scientific_name' => 'Chrysanthemum × koreanum',
           'description' => 'Chrysanthemums or ‘Mums’ are a stalwart of the autumn garden. With varieties hardy in most climates and their ability to be pinched and forced to bloom at the end of the season, these jewel toned beauties make a welcome splash in the garden when most summer bloomers have begun to fade. Bloom times vary with variety and climate, from Early September through mid-October.',
           'image' => 'http://www.plantsgaloreonline.co.uk/images/products/large/907_hardychrysanthemumpink300.jpg',
           'success' => 'I have done very well with this plant',
           'min_zone' => '5a',
           'max_zone' => '9b',
           'height' => '2-3 ft',
           'bloomtime' => 'fall',
           'planted' => 'Fall 2015',
           'location' => 1,
       ]);

       DB::table('plants')->insert([
           'created_at' => Carbon\Carbon::now()->toDateTimeString(),
           'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
           'common_name' => 'Spotted Dead Nettle',
           'scientific_name' => 'Lamium maculatum',
           'description' => 'One of our favorite fast growing perennials to be used as a ground cover!  Lamium prefers a semi-shady dry area with well-drained soil but will tolerate a wide range of soils and moisture.  It is best to cut this plant back after the first bloom to promote compact growth.  This plant can be invasive. ',
           'image' => 'https://e54055a024bc6fb58d47-f7df714a3b816a175961a96ef2278d84.ssl.cf2.rackcdn.com/8179-Red-Nancy-Lamium.jpg',
           'success' => 'This is one of the easiest and fastest growing plants I have ever had',
           'min_zone' => '3a',
           'max_zone' => '8b',
           'height' => '6-8 inches',
           'bloomtime' => 'late spring - fall',
           'planted' => 'Summer 2013',
           'location' => 2,
       ]);
    }
}
