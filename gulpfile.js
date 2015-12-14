<<<<<<< HEAD
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
        extname: ".min.css"
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
            extname: ".min.js"
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
=======
var gulp = require('gulp'),
   spawn = require('child_process').spawn,
    exec = require('child_process').exec,
      sh = require('sh'),
    bump = require('gulp-bump'),
  jshint = require('gulp-jshint'),
 replace = require('gulp-replace'),
    argv = require('yargs').array('browsers').argv;


gulp.task('karma', function (done) {
    var karma = require('karma');

    var server = new karma.Server({
        configFile: __dirname + '/configs/karma.conf.js',
        singleRun: argv.dev ? false : true
    }, function(exitStatus) {
        done(exitStatus ? "There are failing unit tests" : undefined);
    });

    server.start();
});

gulp.task('render', function (done) {gulp.src(['file.txt'])
    var webshot = require('webshot'),
          async = require('async');

    var charts = [
        'LineChart',
        'TableChart',
        'Dashboard'
    ];

    var phpserver = spawn('php', ['-S', '127.0.0.1:8946', '-t', 'tests/Examples'], {cwd: __dirname});

    var render = function (chart, callback) {
        webshot('http://127.0.0.1:8946/index.php?chart=' + chart, 'build/renders/' + chart + '.png', function (err) {
            if (err) { callback(err); }

            console.log('Rendered ' + chart);
            return callback();
        });
    };

    phpserver.on('data', function (data) {
        console.log(data);
    });

    phpserver.on('close', function (err) {
        console.log('Done');
    });

    async.forEach(charts, render, function (error) {
        if (error) { console.log(error); }

        console.log('Stopping PHP Server');
        phpserver.kill('SIGINT');
    });
});

gulp.task('php:test', function (done) {
    var test = spawn('./vendor/bin/phpunit', ['-c', 'configs/phpunit.xml']);

    test.on('data', function (data) {
        console.log(data);
    });
});

gulp.task('php:coverage', function (done) {
    sh('./vendor/bin/phpunit -c configs/phpunit.xml.coverage');
});

gulp.task('php:doc', function (done) {
    sh('./vendor/bin/sami.php update configs/sami.cfg.php');
});

gulp.task('php:cs', function (done) {
    sh('./vendor/bin/phpcs -n --standard=PSR2 ./src ./tests');
});

gulp.task('php:fix', function (done) {
    sh('./vendor/bin/phpcbf -n --standard=PSR2 ./src ./tests');
});

gulp.task('js:lint', function (done) {
    gulp.src('./javascript/lava.js')
        .pipe(jshint());
});

gulp.task('bump', function (done) { //-v=1.2.3
    var version = argv.v;
    var minorVersion = version.slice(0, -2);

    gulp.src('./package.json')
        .pipe(bump({version:argv.v}))
        .pipe(gulp.dest('./'));

    gulp.src(['./README.md', './.travis.yml'])
        .pipe(replace(/("|=|\/|-)[0-9]+\.[0-9]+/g, '$1'+minorVersion))
        .pipe(gulp.dest('./'));
});
>>>>>>> origin/3.0
