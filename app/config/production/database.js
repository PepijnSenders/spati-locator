module.exports = (function(MONGOLAB_URI) {

    return {
        uri: MONGOLAB_URI
    };

}(process.env.MONGOLAB_URI));
