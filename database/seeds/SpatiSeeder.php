<?php

use Illuminate\Database\Seeder;

use Spati\Spati;
use Spati\Address;
use Spati\Amenity;
use Spati\ContactInformation;
use Spati\Picture;
use Spati\OpeningTime;
use Spati\AlternateOpeningTime;

use Faker\Generator as FakerGenerator;
use Illuminate\Database\DatabaseManager;

class SpatiSeeder extends Seeder
{
    protected $faker;
    protected $databaseManager;

    public function __construct(FakerGenerator $faker, DatabaseManager $databaseManager)
    {
        $this->faker = $faker;
        $this->databaseManager = $databaseManager;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->databaseManager->table('spatis')->truncate();
        $this->databaseManager->table('addresses')->truncate();
        $this->databaseManager->table('contact_informations')->truncate();
        $this->databaseManager->table('amenities')->truncate();
        $this->databaseManager->table('pictures')->truncate();
        $this->databaseManager->table('opening_times')->truncate();
        $this->databaseManager->table('aleternate_opening_times')->truncate();

        factory(Spati::class, 5)->create()->each(function($spati) {
            $address = factory(Address::class)->create();
            $address->spati()->save($spati);

            $contactInformation = factory(ContactInformation::class)->create();
            $contactInformation->spati()->save($spati);

            $amenities = factory(Amenity::class, 5)->create();
            $spati->amenities()->saveMany($amenities);

            $pictures = factory(Picture::class, 10)->create();
            $spati->pictures()->saveMany($pictures);

            $openingTimes = factory(OpeningTime::class, 7)->create();
            $spati->openingTimes()->saveMany($openingTimes);

            $alternateOpeningTimes = factory(AlternateOpeningTime::class, 3)->create();
            $spati->openingTimes()->saveMany($alternateOpeningTimes);
        });
    }
}
