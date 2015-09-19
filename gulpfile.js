  var gulp = require('gulp'),
      sass = require('gulp-ruby-sass'),
     bower = require('gulp-bower'),
    notify = require('gulp-notify'),
     shell = require('gulp-shell'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
  imagemin = require('gulp-imagemin'),
sourcemaps = require('gulp-sourcemaps'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
browserify = require('browserify'),
debowerify = require('debowerify'),
     shims = require('browserify-shim');

//process.env.BROWSERIFYSHIM_DIAGNOSTICS=1;

var config = (function() {
    var basePath = './resources';

    return {
        bowerDir: './bower_components',
        scriptPath: basePath+'/js',
        stylePath: basePath+'/sass',
    };
})();

gulp.task('bower', function() {
    return bower().pipe(gulp.dest(config.bowerDir));
});

gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
               .pipe(gulp.dest('./_site/fonts'));
});

gulp.task('images', function() {
    return gulp.src('./resources/images/**')
               .pipe(imagemin({
                    optimizationLevel: 5,
                    progressive: true,
                    interlaced: true
                }))
               .pipe(gulp.dest('./_site/images'));
});

gulp.task('css', function() {
    return sass(config.stylePath + '/style.sass', {
        style: 'compressed',
        cacheLocation: './.cache/',
        loadPath: [
            './resources/sass',
            config.bowerDir + '/bootstrap-sass-official/assets/stylesheets',
            config.bowerDir + '/fontawesome/sass',
        ]
    })
    .on("error", notify.onError(function (error) {
        return "Error: " + error.message;
    }))
    .pipe(sourcemaps.init())
    .pipe(rename({
        extname: ".min.css"
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./_site/css'));
});

gulp.task('js', function() {
    return browserify({
            debug: true,
            entries: './resources/js/app.js',
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
        .pipe(gulp.dest('./_site/js'));
});

gulp.task('jekyll', shell.task([
    'jekyll build -d /var/www/lavadocs.local/public'
]));

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch(config.stylePath + '/**/*.s(a|c)ss', [
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
