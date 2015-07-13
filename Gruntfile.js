module.exports = function (grunt) {
    var path = require('path');
    var autoprefixer = require('autoprefixer-core');

    grunt.util.linefeed = '\n';

    grunt.initConfig({
        watch: {
            main: {
                files: ['sass/**/*.sass'],
                tasks: ['sass:main']
            },
            bootstrap: {
                files: ['scss/*.scss'],
                tasks: ['sass:bootstrap']
            },
            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    '_includes/**/*.html',
                    'sass/**/*.sass'
                ],
            }
        },

        sass: {
            options: {
                style: 'compressed',
                lineNumbers: false,
                precision: 5//,
                //update: true
            },
            main: {
                files: {
                    'css/main.css': 'sass/main.sass'
                }
            },
            bootstrap: {
                options: {
                    includePaths: ['bower_components/bootstrap-sass/stylesheets']
                },
                files: {
                    'css/bootstrap.css': 'scss/_bootstrap.scss'
                }
            }
        },

        postcss: {
            options: {
                processors: [
                  autoprefixer({ browsers: ['last 2 version'] }).postcss
                ]
            },
            dist: { src: 'css/*.css' }
        }

    });

    require('load-grunt-tasks')(grunt);

    grunt.registerTask('default', [
        'sass',
        'postcss'
    ]);

    grunt.registerTask('watch', [
        'default',
        'watch'
    ]);
};
