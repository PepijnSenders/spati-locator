require('./init');

module.exports = (function(APP_DIR) {

    var Spati = require(APP_DIR + '/models/Spati');
    var faker = require('faker');

    console.log('Removing all spatis');
    Spati.remove({}, function(e) {
        if (e) {
            console.error(e);
        }

        var saved = 0;
        for (var i = 0; i < 100; i++) {
            var spati = Spati({
                loc: [faker.address.longitude(), faker.address.latitude()],
                name: faker.company.companyName(),
                description: faker.lorem.sentences(5),
                openingTimes: {
                    monday: [10, 8],
                    tuesday: [10, 8],
                    wednesday: [10, 8],
                    thursday: [10, 8],
                    friday: [10, 8],
                    saturday: [10, 8],
                    sunday: [10, 8]
                },
                media: [faker.image.imageUrl()]
            });

            spati.save(function(e) {
                if (e) {
                    console.error(e);
                } else {
                    saved++;

                    if (saved === 100) {
                        process.exit();
                    }
                }
            });
        }
    });



}(global.APP_DIR));
