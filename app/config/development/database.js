module.exports = (function(MONGOLAB_URI) {

    return {
        uri: 'mongodb://localhost:27017'
    };

}(process.env.MONGOLAB_URI));
