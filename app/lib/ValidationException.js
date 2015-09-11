module.exports = (function(APP_DIR) {

    var Exception = require(APP_DIR + '/lib/Exception');

    function ValidationException(message, errors) {
        this.message = message;
        this.errors = errors;
    }

    ValidationException.prototype = Exception.prototype;

    return ValidationException;

}(global.APP_DIR));
