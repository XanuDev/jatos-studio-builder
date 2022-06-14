const { defineConfig } = require('@vue/cli-service');
module.exports = defineConfig({
    transpileDependencies: true,
    publicPath: process.env.NODE_ENV === 'production' ? '' : '/',
    chainWebpack: (config) => {
        config.plugin('html').tap((args) => {
            args[0].title = 'Jatos Builder';
            return args;
        });
    },
});
