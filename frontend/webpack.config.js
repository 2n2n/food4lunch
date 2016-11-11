'use strict';
var path = require('path');
module.exports = {
    entry: './bootstrap.js',
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