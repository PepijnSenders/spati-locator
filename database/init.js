require('sugar');
require(__dirname + '/../app/lib/global');

module.exports = (function(APP_DIR) {

    var Database = require(APP_DIR + '/lib/Database');
    var config = require(APP_DIR + '/config');
    Database.connect(config.get('database.uri'));

}(global.APP_DIR));
