/* SASS */
const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'))
const purgecss = require('gulp-purgecss');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

/* JS */
const terser = require('gulp-terser');
const bro = require('gulp-bro');

/* Imagenes */
const imagemin = require('gulp-imagemin');
const avif = require('gulp-avif');
const webp = require('gulp-webp');

/* Otras utilidades */
const sm = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');

const paths = {
    css: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js',
    img: 'src/img/**/*'
}


function css(done) {
    src(paths.css)
        .pipe(sm.init())
        .pipe(plumber())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sm.write('.'))
        .pipe(dest('./public/build/css'))
    done();
}

function buildcss(done) {
    src('./public/build/css/app.css')
        .pipe(rename({ suffix: '.min' }))
        .pipe(purgecss({ content: ['**/*.php', './public/build/js/**/*.js'], safelist: ['offset-md-2', 'offset-md-4', 'offset-md-6'] }))
        .pipe(dest('./public/build/css'))
    done();
}

function imagenes(done) {
    src(paths.img)
        .pipe(imagemin({ optimizationLevel: 3 }))
        .pipe(dest('./public/build/img'))
    done();
}

function convertirAvif(done) {
    const opciones = {
        quality: 70,
    };

    src('./public/build/img/**/*.{jpg,png,jpeg}')
        .pipe(avif(opciones))
        .pipe(dest('./public/build/img'))
    done();
}

function convertirWebp(done) {
    const opciones = {
        quality: 70,
    };
    src('./public/build/img/**/*.{jpg,png,jpeg}')
        .pipe(webp(opciones))
        .pipe(dest('./public/build/img'))
    done();
}


function js(done) {

    src(paths.js)
        .pipe(sm.init())
        .pipe(plumber())
        .pipe(bro())
        .pipe(concat('bundle.js'))
        .pipe(terser())
        .pipe(rename({ suffix: '.min' }))
        .pipe(sm.write('.'))
        .pipe(dest('./public/build/js'))
    done();
}

function dev(done) {
    watch(paths.css, css);
    watch(paths.js, js);
    done();
}

exports.css = css;
exports.js = js;
exports.imagenes = imagenes;
exports.convertirAvif = convertirAvif;
exports.convertirWebp = convertirWebp;
exports.buildcss = buildcss;
exports.dev = dev;

exports.default = series(imagenes, convertirAvif, convertirWebp, css, js, dev);