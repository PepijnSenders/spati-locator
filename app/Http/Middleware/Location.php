<?php

namespace Spati\Http\Middleware;

use Closure;
use Ivory\GoogleMap\Services\Geocoding\Geocoder;
use Ivory\GoogleMap\Services\Geocoding\GeocoderProvider;
use Geocoder\HttpAdapter\CurlHttpAdapter;

class Location
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $location = $request->input('location');

        if (preg_match('/^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?),\s*[-+]?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/i', $location)) {
            list($latitude, $longitude) = explode(',', $location);
        } else {
            $geocoder = new Geocoder();
            $geocoder->registerProviders(array(
                new GeocoderProvider(new CurlHttpAdapter()),
            ));

            $response = $geocoder->geocode($location);

            $location = $response->getResults()[0]->getGeometry()->getLocation();

            $latitude = $location->getLatitude();
            $longitude = $location->getLongitude();
        }

        $request->merge(compact('latitude', 'longitude'));

        return $next($request);
    }
}
