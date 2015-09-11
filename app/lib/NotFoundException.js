module.exports = (function(APP_DIR) {

    var Exception = require(APP_DIR + '/lib/Exception');

    function NotFoundException(message) {
        this.message = message;
    }

    NotFoundException.prototype = Exception.prototype;

    return NotFoundException;

}(global.APP_DIR));
