const webpack = require('webpack');
const path = require('path');
const WebpackNotifierPlugin = require('webpack-notifier');

const isDev = process.env.NODE_ENV === 'development';
const isProd = !isDev;

const babelOptions = preset => {
    const options = {
        presets: [
            '@babel/preset-env'
        ],
    };

    if (preset) {
        options.presets.push(preset);
    }

    return options;
}

const jsLoaders = () => {
    const loaders = [
        {
            loader: 'babel-loader',
            options: babelOptions()
        }
    ];

    // if (isDev) {
    //     loaders.push('eslint-loader');
    // }

    return loaders;
};

module.exports = {
    mode: 'production',
    entry: ['./_src/js/main.js'],
    output: {
        path: path.resolve(__dirname, './dist/js'),
        filename: 'main.min.js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: jsLoaders()
            }
        ]
    },
    plugins: [
        new webpack.SourceMapDevToolPlugin({
            filename: 'main.js.map'
        }),
        new WebpackNotifierPlugin()
    ]
};
