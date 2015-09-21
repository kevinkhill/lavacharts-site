  var gulp = require('gulp'),
      sass = require('gulp-ruby-sass'),
     bower = require('gulp-bower'),
    notify = require('gulp-notify'),
     shell = require('gulp-shell'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
   plumber = require('gulp-plumber'),
  imagemin = require('gulp-imagemin'),
sourcemaps = require('gulp-sourcemaps'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
browserify = require('browserify'),
debowerify = require('debowerify'),
     shims = require('browserify-shim');

//process.env.BROWSERIFYSHIM_DIAGNOSTICS=1;

var config = (function() {
    var resources = './resources';

    return {
        paths: {
            src     : resources,
            dest    : '_site',
            cache   : './.cache',
            scripts : resources+'/js',
            styles  : resources+'/sass',
            images  : resources+'/images',
            bower   : './bower_components',
        }
    };
})();

gulp.task('bower', function() {
    return bower().pipe(gulp.dest(config.paths.bower));
});

gulp.task('icons', function() {
    return gulp.src(config.paths.bower + '/fontawesome/fonts/**')
               .pipe(gulp.dest(config.paths.dest+'/fonts'));
});

gulp.task('images', function() {
    return gulp.src(config.paths.images+'/**')
               .pipe(plumber())
               .pipe(imagemin({
                    optimizationLevel: 5,
                    progressive: true,
                    interlaced: true
                }))
               .pipe(gulp.dest(config.paths.dest+'/images'));
});

gulp.task('css', function() {
    return sass(config.paths.styles+'/style.sass', {
        style: 'compressed',
        cacheLocation: config.paths.cache,
        loadPath: [
            config.paths.styles,
            config.paths.bower + '/bootstrap-sass-official/assets/stylesheets',
            config.paths.bower + '/fontawesome/sass',
        ]
    })
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(rename({
        extname: ".min.css"
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.paths.dest+'/css'));
});

gulp.task('js', function() {
    return browserify({
            debug: true,
            entries: config.paths.scripts+'/app.js',
            transform: [
                shims,
                debowerify
            ]
        })
        .bundle()
        .pipe(source('bundle.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(rename({
            extname: ".min.js"
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.paths.dest+'/js'));
});

gulp.task('jekyll', shell.task([
    'jekyll build -d /var/www/lavadocs.local/public'
]));

// Rerun the task when a file changes
gulp.task('watch', ['default'], function() {
    gulp.watch(config.paths.styles+'/**/*.s(a|c)ss', [
        'css'
    ]);

    gulp.watch(config.scriptPath + '/**/*.js', [
        'js'
    ]);

    gulp.watch('./_includes/**.(md|html)', [
        'jekyll'
    ]);
});

gulp.task('default', [
    'bower',
    'icons',
    'css',
    'images'
]);
