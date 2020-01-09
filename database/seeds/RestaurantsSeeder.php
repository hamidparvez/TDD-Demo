<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Restaurant;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = (new FastExcel())->import(storage_path('files/Rest.csv'), function ($line) {
            return Restaurant::create([
                'name' => $line['name'],
                'branch' => $line['branch'],
                'phone' => $line['phone'],
                'email' => $line['email'],
                'logo' => $line['logo'],
                'address' => $line['address'],
                'housenumber' => $line['housenumber'],
                'postcode' => $line['postcode'],
                'city' => $line['city'],
                'latitude' => strval($line['latitude']),
                'longitude' => strval($line['longitude']),
                'url' => $line['url'],
                'open' => $line['open'],
                'bestMatch' => $line['bestMatch'],
                'newestScore' => $line['newestScore'],
                'ratingAverage' => $line['ratingAverage'],
                'popularity' => $line['popularity'],
                'deliveryCosts' => $line['deliveryCosts'],
                'minimumOrderAmount' => $line['minimumOrderAmount'],
            ]);
        });
    }
}
