  var gulp = require('gulp'),
      sass = require('gulp-ruby-sass'),
     bower = require('gulp-bower'),
    notify = require('gulp-notify'),
     shell = require('gulp-shell'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
     newer = require('gulp-newer'),
   plumber = require('gulp-plumber'),
  imagemin = require('gulp-imagemin'),
sourcemaps = require('gulp-sourcemaps'),
livereload = require('gulp-livereload'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
browserify = require('browserify'),
debowerify = require('debowerify'),
   shimify = require('browserify-shim');

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
/*
gulp.task('icons', function() {
    return gulp.src(config.paths.bower + '/fontawesome/fonts/**')
               .pipe(gulp.dest(config.paths.dest+'/fonts'));
});
*/
gulp.task('images', function() {
    return gulp.src(config.paths.images+'/**')
               .pipe(newer(config.paths.dest+'/images'))
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
            //config.paths.bower + '/fontawesome/sass',
        ]
    })
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(rename({
        extname: ".v3.min.css"
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(config.paths.dest+'/css'))
    .pipe(livereload());
});

gulp.task('js', function() {
    return browserify({
            entries: [config.paths.scripts+'/app.js']
        })
        .bundle()
        .pipe(source('bundle.js'))
        .pipe(buffer())
        //.pipe(sourcemaps.init())
        //.pipe(uglify())
        //.pipe(sourcemaps.write())
        .pipe(rename({
            extname: ".v3.min.js"
        }))
        .pipe(gulp.dest(config.paths.dest+'/js'))
        .pipe(livereload());
});


gulp.task('watch', ['default'], function() {
    livereload.listen();

    gulp.watch(config.paths.styles+'/**/*ss', [
        'css'
    ]);

    gulp.watch(config.paths.scripts + '/**/*.js', [
        'js'
    ]);
});

gulp.task('default', [
    'bower',
    //'icons',
    'js',
    'css',
    'images'
]);
