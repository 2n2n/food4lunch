'use strict';
var path = require('path');
module.exports = {
    entry: './index.js',
    output: {
        filename: 'app.bundle.js',
        path: '../js'
    },
    resolve: {
        moduleDirectories: [
            'node_modules'
        ],
        extensions: ['', '.js']
    }
};
