module.exports = (function(APP_DIR) {

    var request = require('request');
    var Q = require('q');
    var Exception = require(APP_DIR + '/lib/Exception');

    var Geocoder = {
        geocode: function(options) {
            var deferred = Q.defer();

            var url = 'https://maps.googleapis.com/maps/api/geocode/json?address={address}'.assign(options);

            request(url, function(e, response, body) {
                if (e) {
                    deferred.reject(new Exception(e));
                } else {
                    deferred.resolve(JSON.parse(body).results);
                }
            });

            return deferred.promise;
        }
    };

    return Geocoder;

}(global.APP_DIR));
