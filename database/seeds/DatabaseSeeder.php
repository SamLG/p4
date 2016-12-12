<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GardensTableSeeder::class);
        $this->call(PlantsTableSeeder::class);
        $this->call(WishlistplantsTableSeeder::class);
        $this->call(GardenPlantTableSeeder::class); # pivot table
        $this->call(GardenWishlistplantTableSeeder::class); # pivot table
    }
}
