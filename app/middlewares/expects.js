module.exports = (function(APP_DIR) {

    var validations = require(APP_DIR + '/lib/validations');
    var types = require(APP_DIR + '/lib/types');
    var i18n = require(APP_DIR + '/i18n');

    return function(req, res, next) {
        req.expects = function(params) {
            var _params = {}, _errors = [];

            for (var attribute in params) {
                var args = params[attribute];
                var value = req.params[attribute] || req.query[attribute];
                if ('default' in args && !value) {
                    _params[attribute] = args.default;
                } else {
                    _params[attribute] = value;
                }
                if ('type' in args && args.type in types) {
                    _params[attribute] = types[args.type](_params[attribute]);
                }
                if ('validations' in args) {
                    var _validations = args.validations.split('|');
                    if (!!~_validations.indexOf('required') || !validations.required(_params[attribute])) {
                        _validations.forEach(function(validation) {
                            var validationValue;
                            if (validation.match(':')) {
                                var validationKeys = validation.split(':');
                                validation = validationKeys[0];
                                validationValue = validationKeys[1];
                            }
                            if (validation in validations) {
                                var message = validations[validation](attribute, _params[attribute], validationValue);
                                if (message) {
                                    _errors.push(message);
                                }
                            } else {
                                _errors.push(i18n.get('validations.nonExistingValidation', {
                                    validation: validation
                                }));
                            }
                        });
                    }
                }
            }

            if (_errors.length) {
                throw _errors;
            } else {
                return _params;
            }
        };

        next();
    };

}(global.APP_DIR));
