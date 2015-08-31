module.exports = (function(APP_DIR, ENV) {

    var fs = require('fs');

    var Config = {
        get: function(search) {
            var keys = search.split('.');

            var namespace = keys.first();

            return this._getConfig(namespace)[keys.last()];
        },
        _getConfig: function(namespace) {
            var path = APP_DIR +  '/config/' + ENV + '/' + namespace;
            if (fs.existsSync(path + '.js')) {
                return require(path);
            } else {
                throw new Error('Config file not found');
            }
        }
    };

    return Config;

}(global.APP_DIR, global.ENV));
