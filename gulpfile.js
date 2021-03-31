const gulp           = require('gulp');
// const util          = require('gulp-util');
const server         = require('browser-sync').create();
const nunjucksRender = require('gulp-nunjucks-render');
const htmlbeautify   = require('gulp-html-beautify');
const sass           = require('gulp-sass');
const mqpacker       = require("css-mqpacker");
const autoprefixer   = require('autoprefixer');
const csso           = require('postcss-csso');
const sourcemaps     = require('gulp-sourcemaps');
const plumber        = require('gulp-plumber')
const sassGlob       = require('gulp-sass-glob');
const postcss        = require('gulp-postcss');
const notify         = require('gulp-notify');
const eslint         = require('gulp-eslint');
const webpack        = require('webpack');
const webpackStream  = require('webpack-stream');
const webpackConfig  = require('./webpack.config');
const svgSprite      = require("gulp-svg-sprites");
const svgmin         = require("gulp-svgmin");
const cheerio        = require("gulp-cheerio");
const replace        = require("gulp-replace");
const concat         = require('gulp-concat');
const rename         = require('gulp-rename');

const path = {
    root: '.',
    src: {
        //nun: './_src/nun/',
        sass: './css/sass/',
        // js: './_src/js/',
        // img: './_src/img/',
        // fonts: './_src/fonts/'
    },
    dist: {
        //html: './dist/',
        css: './css/',
        // js: './dist/js/',
        // img: './dist/img/',
        // fonts: './dist/fonts/'
    }
}

gulp.task('serve', function () {
    server.init({
        server: {
            baseDir: './',
            directory: false,
            serveStaticOptions: {
                extensions: ['html']
            }
        },
        files: [
            path.dist.html + '*.html',
            path.dist.css + '*.css',
            path.dist.img + '**/*'
        ],
        open: false,
        online: false,
    });
    server.watch('dist', server.reload);
});

gulp.task('nun', function () {
    const options = {
        indentSize: 4
    };
    return gulp
        .src(path.src.nun + 'pages/*.+(html|nunjucks)')
        .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
        .pipe(nunjucksRender({
            path: [path.src.nun]
        }))
        .pipe(htmlbeautify(options))
        .pipe(gulp.dest(path.dist.html));
});

gulp.task('js', function() {
    return gulp
        .src(path.src.js + '/main.js')
        .pipe(webpackStream(webpackConfig), webpack)
        .pipe(gulp.dest(path.dist.js));
});

gulp.task('js:libs', function() {
    return gulp.src(path.src.js + 'libs/**/*.js')
    .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
    .pipe(concat('libs.min.js'))
    .pipe(gulp.dest(path.dist.js))
});
    
gulp.task('lint', function() {
    return gulp
        .src(path.src.js + 'modules/**/*.js')
        .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
        .pipe(eslint({
            extends: 'eslint:recommended',
            ecmaFeatures: {
                'modules': true
            },
            parser: 'babel-eslint',
            rules: {
                strict: 2,
                semi: 2,
                'no-console': 0,
                'no-unused-vars': 1,
                'no-undef': 0
            },
            envs: ['browser']
        }))
        .pipe(eslint.format('stylish'))
        .pipe(eslint.failAfterError());
});

gulp.task('sass', function () {
    const plugins = [
        mqpacker({
            sort: sortMediaQueries
        }),
        autoprefixer({
            overrideBrowserslist: [
                'last 4 version',
                '> 1%',
                'ie 11'
            ] 
        }),
        csso({
            restructure: false
        })
    ];
    return gulp
        .src(path.src.sass + '/*.*')
        .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss(plugins))
        .pipe(rename({suffix: ".min"}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.dist.css))
});

gulp.task('svg:sprite', function () {
    return gulp.src(path.src.img + 'svg-sprite/*.svg')
        .pipe(plumber({ errorHandler: notify.onError('Error: <%= error.message %>') }))
        // .pipe(svgmin({
        //     js2svg: {
        //         pretty: true
        //     },
        //     plugins: [{
        //         removeDesc: true
        //     }, {
        //         cleanupIDs: true
        //     }, {
        //         mergePaths: false
        //     }]
        // }))
        .pipe(cheerio({
            run: function ($) {
                $('[fill]').removeAttr('fill');
                $('[stroke]').removeAttr('stroke');
                $('[style]').removeAttr('style');
            }
        }))
        .pipe(replace('&gt;', '>'))
        .pipe(svgSprite({
            mode: "symbols",
            preview: false,
            selector: "icon-%f",
            svg: {
                symbols: 'sprite.svg'
            }
        }))
        .pipe(gulp.dest(path.dist.img));
});

gulp.task('svg:optim', function () {
    return gulp.src(path.src.img + 'svg/*.svg')
        .pipe(plumber())
        .pipe(svgmin({
            js2svg: {
                pretty: true
            },
            plugins: [{
                removeDesc: true
            }, {
                cleanupIDs: true
            }, {
                mergePaths: false
            }]
        }))
        .pipe(replace('&gt;', '>'))
        .pipe(gulp.dest(path.dist.img + 'svg/'));
});

gulp.task('img:admin', function () {
    return gulp
        .src(path.src.img + 'admin/**/*.{jpg,png,jpeg,webp}')
        .pipe(gulp.dest(path.dist.img + 'admin/'));
});

gulp.task('img:static', function () {
    return gulp
        .src(path.src.img + 'static/**/*.{jpg,png,jpeg,webp}')
        .pipe(gulp.dest(path.dist.img + 'static/'));
});

gulp.task('copy:fonts', function () {
    return gulp
        .src(path.src.fonts + '/**/*.{otf,ttf,eot,woff,woff2}')
        .pipe(gulp.dest(path.dist.fonts));
});

gulp.task('watch', function() {

    // nunjucks --> html
    //gulp.watch(path.src.nun + '**/*.*', gulp.series('nun'));

    // SASS --> CSS
    gulp.watch(path.src.sass + '**/*.*', gulp.series('sass'));

    // JS
    //gulp.watch(path.src.js + '**/*.js', gulp.series('js'));

    // JS-линтер
    //gulp.watch(path.src.js + 'modules/*.js', gulp.series('lint'));

    // SVG
    //gulp.watch(path.src.img + 'svg-sprite/*.svg', gulp.series('svg:sprite'));
    //gulp.watch(path.src.img + 'svg/*.svg', gulp.series('svg:optim'));

    // IMG
    //gulp.watch(path.src.img + 'admin/**/*', gulp.series('img:admin'));
    //gulp.watch(path.src.img + 'static/**/*', gulp.series('img:static'));
});

gulp.task('default', gulp.series(
    gulp.parallel(
        //'nun',
        'sass',
        // 'js',
        // 'js:libs',
        // 'svg:sprite',
        // 'svg:optim',
        // 'img:admin',
        // 'img:static',
        // 'copy:fonts'
    ),
    gulp.parallel(
        'watch',
        'serve'
    )
));


function isMax(mq) {
    return /max-width/.test(mq);
}

function isMin(mq) {
    return /min-width/.test(mq);
}

function sortMediaQueries(a, b) {
    let A = a.replace(/\D/g, '');
    let B = b.replace(/\D/g, '');

    if (isMax(a) && isMax(b)) {
        return B - A;
    } else if (isMin(a) && isMin(b)) {
        return A - B;
    } else if (isMax(a) && isMin(b)) {
        return 1;
    } else if (isMin(a) && isMax(b)) {
        return -1;
    }

    return 1;
}