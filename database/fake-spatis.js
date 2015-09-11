require('sugar');
require(__dirname + '/../app/lib/global');

module.exports = (function(APP_DIR) {

    var Database = require(APP_DIR + '/lib/Database');
    var config = require(APP_DIR + '/config');
    var Spati = require(APP_DIR + '/models/Spati');
    var faker = require('faker');

    Database.connect(config.get('database.uri'));

    console.log('Removing all spatis');
    Spati.remove({}, function(e) {
        if (e) {
            console.error(e);
        }

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
                }
            });
        }
    });



}(global.APP_DIR));
