<?php

use Illuminate\Database\Seeder;

use Spati\Spati;
use Spati\Address;
use Spati\Amenity;
use Spati\ContactInformation;
use Spati\Picture;
use Spati\OpeningTime;
use Spati\AlternateOpeningTime;

use Illuminate\Database\DatabaseManager;

class SpatiSeeder extends Seeder
{
    protected $databaseManager;

    public function __construct(DatabaseManager $databaseManager)
    {
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
        $this->databaseManager->table('alternate_opening_times')->truncate();

        factory(Spati::class, 100)->create()->each(function($spati) {
            $address = factory(Address::class)->create();
            $spati->contactInformation()->save($address);

            $contactInformation = factory(ContactInformation::class)->create();
            $spati->contactInformation()->save($contactInformation);

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
