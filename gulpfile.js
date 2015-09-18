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
   process = require('process');

//process.env.BROWSERIFYSHIM_DIAGNOSTICS=1;

var browserify = require('browserify');
var debowerify = require('debowerify');
var browserify_shim = require('browserify-shim');

var config = {
    sassPath: './resources/sass',
    bowerDir: './bower_components'
};

gulp.task('browserify', function() {
    return browserify({
            debug: true,
            entries: './resources/js/app.js',
            transform: [
                browserify_shim,
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
    return sass(config.sassPath + '/style.sass', {
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

gulp.task('jekyll', shell.task([
    'jekyll build -d /var/www/lavadocs.local/public'
]));

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch(config.sassPath + '/**/*.sass', ['css']);
    gulp.watch('./_includes/**.*', ['jekyll']);
});

gulp.task('default', ['bower', 'icons', 'css']);
