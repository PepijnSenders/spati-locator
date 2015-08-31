module.exports = (function(fs) {
    global.APP_DIR = fs.realpathSync(__dirname + '/../../app');
    global.PUBLIC_DIR = fs.realpathSync(__dirname + '/../../public');
    global.TMP_DIR = fs.realpathSync(__dirname + '/../../tmp');

    global.ENV = process.env.NODE_ENV ? process.env.NODE_ENV : 'development';
    global.PORT = process.env.PORT ? process.env.PORT : 4000;

    return global;
}(require('fs')));
