<?php

$factory->define(Spati\Spati::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(500),
    ];
});

$factory->define(Spati\Address::class, function(Faker\Generator $faker) {
    return [
        'locality' => $faker->city,
        'street_address' => $faker->streetAddress,
        'postal_code' => $faker->postcode,
        'country' => $faker->country,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});

$factory->define(Spati\Amenity::class, function(Faker\Generator $faker) {
    return [
        'has_tv' => $faker->boolean,
        'has_gambling' => $faker->boolean,
        'has_cigarettes' => $faker->boolean,
        'has_beer' => $faker->boolean,
        'has_liquor' => $faker->boolean,
        'has_printing' => $faker->boolean,
        'has_snacks' => $faker->boolean,
        'has_warm_food' => $faker->boolean,
        'has_household' => $faker->boolean,
    ];
});

$factory->define(Spati\Picture::class, function(Faker\Generator $faker) {
    return [
        'url' => $faker->imageUrl,
        'title' => $faker->sentence,
        'caption' => $faker->text,
    ];
});

$factory->define(Spati\ContactInformation::class, function(Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'email' => $faker->email,
        'website' => $faker->url,
        'facebook' => $faker->url,
        'yelp' => $faker->url,
        'google_plus' => $faker->url,
        'trip_advisor' => $faker->url,
        'foursquare' => $faker->url,
    ];
});

$factory->define(Spati\OpeningTime::class, function(Faker\Generator $faker) {
    $time1 = $faker->time;
    $time2 = $faker->time;

    if (strtotime($time1) > strtotime($time2)) {
        $closeTime = $time1;
        $openTime = $time2;
    } else {
        $openTime = $time1;
        $closeTime = $time2;
    }

    return [
        'day_of_week' => $faker->numberBetween(1, 7),
        'open_time' => $openTime,
        'close_time' => $closeTime,
        'closed' => $faker->boolean,
    ];
});

$factory->define(Spati\AlternateOpeningTime::class, function(Faker\Generator $faker) {
    $time1 = $faker->time;
    $time2 = $faker->time;

    if (strtotime($time1) > strtotime($time2)) {
        $closeTime = $time1;
        $openTime = $time2;
    } else {
        $openTime = $time1;
        $closeTime = $time2;
    }

    $date1 = $faker->date;
    $date2 = $faker->date;

    if (strtotime($date1) > strtotime($date2)) {
        $endDate = $date1;
        $startDate = $date2;
    } else {
        $startDate = $date1;
        $endDate = $date2;
    }

    return [
        'day_of_week' => $faker->numberBetween(1, 7),
        'open_time' => $openTime,
        'close_time' => $closeTime,
        'closed' => $faker->boolean,
        'override_start_date' => $startDate,
        'override_end_date' => $endDate,
    ];
});
