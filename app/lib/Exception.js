module.exports = (function() {

    function Exception(message) {
        this.message = message;
    }

    Exception.prototype = Error.prototype;

    return Exception;

}());
