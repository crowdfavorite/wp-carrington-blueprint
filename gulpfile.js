var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var watching = false;
var paths = {
	styles: ['./assets/scss/**/*.scss']
};

var pluginlog = function(e) {
	gutil.log('[' + gutil.colors.green(e.plugin) + ']', e.name, e.message);
};

gulp.task('styles', function() {
	return gulp.src(paths.styles)
		.pipe(sass({
			'output_style': 'nested',
			'errLogToConsole': watching
		}).on('error', pluginlog))
		.pipe(gulp.dest('./assets/css'));
});

gulp.task('watching', function() {
	watching = true;
});

gulp.task('watch', ['watching', 'styles'], function() {
	gulp.watch(paths.styles, ['styles']);
});

gulp.task('default', ['styles']);

