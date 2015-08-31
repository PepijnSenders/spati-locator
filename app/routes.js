module.exports = (function(APP_DIR) {

    var SpatiController = require(APP_DIR + '/controllers/SpatiController');

    return function(app) {
        app.get('/', SpatiController.index);
    };

}(global.APP_DIR));
