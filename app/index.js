require('sugar');

module.exports = (function() {

    var express = require('express');
    var bodyParser = require('body-parser');
    var morgan = require('morgan');

    require(__dirname + '/lib/global.js');

    var config = require(global.APP_DIR + '/config');
    var routes = require(global.APP_DIR + '/routes');
    var expects = require(global.APP_DIR + '/middlewares/expects');
    var cors = require(global.APP_DIR + '/middlewares/cors');
    var Database = require(global.APP_DIR + '/lib/Database');

    var app = express();

    app.use(morgan('dev'));
    app.use(bodyParser.json());

    app.use(cors);
    app.use(expects);

    Database.connect(config.get('database.uri'));

    app.set('public', global.PUBLIC_DIR);
    app.set('showStackError', true);
    app.use(express.static(global.PUBLIC_DIR));

    app.listen(config.get('app.port'));

    routes(app);

}());
