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
      $this->call( BrandsTableSeeder::class );
      $this->call( GalleryFancyboxesTableSeeder::class );
      $this->call( SliderFeaturesTableSeeder::class );
      $this->call( TechnicalSpecificationsTableSeeder::class );
      $this->call( ExternalSpecificationsTableSeeder::class );
      $this->call( InternalSpecificationsTableSeeder::class );
      $this->call( CarsTableSeeder::class );
    }
}
