module.exports = (function() {

    var mongoose = require('mongoose');

    var SpatiSchema = mongoose.Schema({
        loc: {
            type: [Number]
        },
        name: String,
        description: String,
        openingTimes: {
            monday: [Number],
            tuesday: [Number],
            wednesday: [Number],
            thursday: [Number],
            friday: [Number],
            saturday: [Number],
            sunday: [Number]
        },
        media: [String]
    });

    SpatiSchema.index({
        loc: '2dsphere'
    });

    SpatiSchema.statics.closest = function(location, count, cb) {
        return this.find({
            loc: {
                $near: {
                    $geometry: {
                        type: 'Point',
                        coordinates: [location.lng, location.lat]
                    }
                }
            }
        }).exec(cb);
    };

    return mongoose.model('Spati', SpatiSchema);

}());
