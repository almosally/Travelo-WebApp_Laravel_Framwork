<?php

use Illuminate\Database\Seeder;
use App\Country as Country;


class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(Country::class, 5)->create();
        $country = new Country();
        $country->country = 'France';
        $country->image = 'countryPic.jpg';
        $country->save();
        $country1 = new Country();
        $country1->country = 'Italy';
        $country1->image = 'countryPic1.jpg';
        $country1->save();
        $country2 = new Country();
        $country2->country = 'Germany';
        $country2->image = 'countryPic2.jpg';
        $country2->save();
    }
}
