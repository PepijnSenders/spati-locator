module.exports = (function() {

    var mongoose = require('mongoose');

    var Database = {
        connect: function(config) {
            var driver = mongoose.connect(config, {
                poolSize: 5
            });

            var connection = mongoose.connection;

            connection.on('open', this.onConnectionSuccess);
            connection.on('error', this.onConnectionError);
        },
        onConnectionSuccess: function() {
            console.log('Database success:', arguments);
        },
        onConnectionError: function() {
            console.error('Database error: ', arguments);
        }
    };

    return Database;

}());
