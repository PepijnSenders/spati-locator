module.exports = (function(APP_DIR) {

    var doT = require('dot');
    var fs = require('fs');
    var config = require(APP_DIR + '/config');

    return {
        defaultLanguage: 'en',
        get: function(search, templateValues) {
            var keys = search.split('.');

            var namespace = keys.first();
            if (templateValues && typeof templateValues === 'object') {
                var tmpl = doT.template(this._getTranslations(namespace)[keys.last()]);

                return tmpl(templateValues);
            } else {
                return this._getTranslations(namespace)[keys.last()];
            }
        },
        _getTranslations: function(namespace) {
            var path = global.APP_DIR +  '/i18n/' + config.get('app.lang') + '/' + namespace;
            if (fs.existsSync(path + '.js')) {
                return require(path);
            } else {
                throw new Error('Language file not found');
            }
        }
    };

}(global.APP_DIR));
