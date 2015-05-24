module.exports = function (grunt) {
    var path = require('path');

    var server_pid = 0;

    grunt.util.linefeed = '\n';

    grunt.initConfig({

        php: {
            test: {
                options: {
                    base: path.resolve(__dirname + '../../../'),
                    port: 8000,
                    keepalive: true,
                    //open: true
                }
            }
        },

        watch: {
            theme: {
                files: ['sass/**/*.sass'],
                tasks: ['sass:theme']
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
                    'sass/**/*.sass',
                    'partials/*.twig',
                    '*.twig'
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
            theme: {
                files: {
                    'css/theme.css': 'sass/theme.sass'
                }
            }
        },

        concurrent: {
            watchserver: ['php', 'watch']
        },

        notify: {
            watch: {
                options: {
                    title: 'Watchfile has changed',
                    message: 'Reloading ...'
                }
            }
        }

    });


    require('load-grunt-tasks')(grunt);

    grunt.registerTask('default', [
        'sass',
        'watch'
    ]);

    grunt.registerTask('serve', [
        'sass',
        'concurrent'
    ]);

};
