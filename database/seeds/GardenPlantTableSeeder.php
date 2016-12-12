<?php

use Illuminate\Database\Seeder;
use P4\Garden;
use P4\Plant;

class GardenPlantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the books we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        $gardens =[
            'Flowerbed' => ['Peony Rasberry Sorbet','Hardy Chrysanthemum','Spotted Dead Nettle'],
            'Stone & Water Garden' => ['Hardy Chrysanthemum','Spotted Dead Nettle'],
            // '' => ['autobiography','nonfiction','classic','women']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($gardens as $name => $plants) {

            # First get the book
            $garden = Garden::where('name','like',$name)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach($plants as $common_name) {
                $plant = Plant::where('common_name','LIKE',$common_name)->first();

                # Connect this tag to this book
                $garden->plants()->save($plant);
            }

        }
    }
}
