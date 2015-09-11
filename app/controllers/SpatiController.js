module.exports = (function(APP_DIR) {

    var Geocoder = require(APP_DIR + '/modules/google/Geocoder');
    var NotFoundException = require(APP_DIR + '/lib/NotFoundException');
    var Exception = require(APP_DIR + '/lib/Exception');
    var Spati = require(APP_DIR + '/models/Spati');

    var SpatiController = {

        index: function(req, res) {
            try {
                var params = req.expects({
                    'address': {
                        type: 'string',
                        validations: 'required'
                    }
                });
            } catch (e) {
                return res.status(400).send(e);
            }

            Geocoder.geocode({
                address: params.address
            }).then(function(results) {
                if (results.length > 0) {
                    var result = results.first();
                    Spati.closest({
                        lat: result.geometry.location.lat,
                        lng: result.geometry.location.lng
                    }, 10, function(e, spati) {
                        console.log(arguments);
                        if (e) {
                            res.status(400).send(new Exception(e));
                        } else {
                            res.status(200).send(spati);
                        }
                    });
                } else {
                    res.status(404).send(new NotFoundException('No results found.'))
                }
            }).catch(function(e) {
                res.status(500).send(new Exception(e));
            });
        }

    };

    return SpatiController;

}(global.APP_DIR));
