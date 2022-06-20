const { defineConfig } = require('@vue/cli-service');
const pages = process.env.BUILD_PAGES.split(' ');

let oPages = [];
pages.forEach(page => {
    oPages[page] = 
        {            
            entry: 'src/main.js',            
            template: 'public/index.html',            
            filename: page + '.html',
            title: page,
            chunks: ['chunk-vendors', 'chunk-common', page]
        };    
})

module.exports = defineConfig({
    transpileDependencies: true,
    publicPath: process.env.NODE_ENV === 'production' ? '' : '/',
    pages:  Object.assign({}, oPages) ,
    // chainWebpack: (config) => {
    //     config.plugin('html').tap((args) => {
    //         args[0].title = 'Jatos Builder';
    //         return args;
    //     });
    // },
});
