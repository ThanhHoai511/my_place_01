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
        $this->call(CategoriesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(CollectionsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(RateRiviewsTableSeeder::class);
        $this->call(CateValsTableSeeder::class);
        $this->call(SildesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
    }
}
