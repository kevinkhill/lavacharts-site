var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
   bower = require('gulp-bower'),
  notify = require('gulp-notify'),
     run = require('gulp-run'),
  rename = require('gulp-rename');

var jekyll = new run.Command('jekyll');

var config = {
    sassPath: './resources/sass',
    bowerDir: './bower_components'
};


gulp.task('bower', function() {
    return bower().pipe(gulp.dest(config.bowerDir));
});

gulp.task('icons', function() {
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
               .pipe(gulp.dest('./_site/fonts'));
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
    .pipe(rename({
        extname: ".min.css"
    }))
    .pipe(gulp.dest('./_site/css'));
});

gulp.task('jekyll', function() {
    run('jekyll build -d /var/www/lavadocs.local/public');
});

// Rerun the task when a file changes
gulp.task('watch', function() {
    gulp.watch(config.sassPath + '/**/*.sass', ['css']);
    gulp.watch('./_includes/**.*', ['jekyll']);
});

gulp.task('default', ['bower', 'icons', 'css']);
