/**
 * Define extensions
 */
var gulp = require('gulp'),
	gutil = require('gulp-util'),
	sass = require('gulp-sass'),
	filesCached = require('gulp-cached'),
    filesChanged = require('gulp-changed'),
    jsHint = require('gulp-jshint'),
    liveReload = require('gulp-livereload'),
    tinylr = require('tiny-lr'),
    stripDebug = require('gulp-strip-debug'),
    jsMinify = require('gulp-uglify'),
    cssMinify = require('gulp-cssmin'),
    concat = require('gulp-concat'),
    // imageoptim = require('gulp-imageoptim'),
    // csscss = require('gulp-csscss'),
    prefixer = require('gulp-autoprefixer'),
	watching = false,
	server = tinylr(),
	files = {
		dev: {
			sass: './assets/scss/*.scss',
			css: './assets/css/*.css',
			js: './assets/js/*.js',
			img: './assets/img/*'
		},
		build: {
			css: './assets/build/*.css',
			js: './assets/build/*.js'
		}
	},
	paths = {
		dev: {
			sass: './assets/scss/',
			css: './assets/css/',
			js: './assets/js/',
			img: './assets/img/'
		},
		build: './assets/build/'
	},
	pluginlog = function(e) {
		gutil.log('[' + gutil.colors.green(e.plugin) + ']', e.name, e.message);
	};

/**
 * Define tasks
 */
gulp.task('devCss', function() {
	return gulp.src(files.dev.sass)
		.pipe(sass({
			'output_style': 'nested',
			'errLogToConsole': watching
		}).on('error', pluginlog))
		.pipe(prefixer('last 2 versions', '> 5%', 'ie 8'))
		// .pipe(csscss())
		.pipe(gulp.dest(paths.dev.css))
		.pipe(liveReload(server));
});


gulp.task('devJs', function() {
	return gulp.src(files.dev.js)
		.pipe(jsHint())
		.pipe(jsHint.reporter('default'));
});

gulp.task('watching', function() {
	watching = true;
});

// Development task
gulp.task('watch', ['watching'], function() {
	// LiveReload server listening
	server.listen(35729, function(err) {
		if (err) {
			return console.log(err);
		}

		// Processing
		gulp.watch(files.dev.sass, ['devCss']);
		gulp.watch(files.dev.js, ['devJs']);
	});
});

// Production task
gulp.task('build', function() {
	// return gulp.src(paths.styles)
	// 	.pipe(sass({
	// 		'output_style': 'nested',
	// 		'errLogToConsole': watching
	// 	}).on('error', pluginlog))
	// 	.pipe(gulp.dest('./assets/css'));
});

// Default task
gulp.task('default', ['watch']);

