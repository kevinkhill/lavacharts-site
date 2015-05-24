module.exports = function (grunt) {
    var path = require('path');

    grunt.util.linefeed = '\n';

    grunt.initConfig({
        watch: {
            main: {
                files: ['sass/**/*.sass'],
                tasks: ['sass:main']
            },
            foundation: {
                files: ['scss/*.scss'],
                tasks: ['sass:foundation']
            },
            livereload: {
                options: {
                    livereload: true
                },
                files: [
                    'sass/**/*.sass'
                ],
            }
        },

        sass: {
            options: {
                style: 'compressed',
                lineNumbers: false,
                precision: 5,
                update: true
            },
            foundation: {
                options: {
                    includePaths: ['bower_components/foundation/scss']
                },
                files: {
                    'css/foundation.css': 'scss/foundation.scss'
                }
            },
            main: {
                files: {
                    'css/main.css': 'sass/main.sass'
                }
            }
        }

    });

    require('load-grunt-tasks')(grunt);

    grunt.registerTask('default', [
        'sass',
        'watch'
    ]);
};
