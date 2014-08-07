var gulp = require('gulp');
var concat = require('gulp-concat');

var srcDir = 'bin/test/';

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('build', function() {
  gulp.src([
  	srcDir + 'file',
  	srcDir + 'file1',
  	srcDir + 'file2',
  	srcDir + 'file3'
	])
  .pipe(concat('index2.html'))
  .pipe(gulp.dest('./'));
});