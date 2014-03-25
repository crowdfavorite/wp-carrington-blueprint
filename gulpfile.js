/**
 * Define extensions
 */
var gulp = require('gulp'),
	gutil = require('gulp-util'),
	sass = require('gulp-sass'),
	filesCached = require('gulp-cache'),
    filesChanged = require('gulp-changed'),
    jsHint = require('gulp-jshint'),
    liveReload = require('gulp-livereload'),
    tinylr = require('tiny-lr'),
    // stripDebug = require('gulp-strip-debug'),
    jsMinify = require('gulp-uglify'),
    cssMinify = require('gulp-minify-css'),
    joinFiles = require('gulp-concat'),
    compressImgs = require('gulp-imagemin'),
    // csscss = require('gulp-csscss'),
    prefixer = require('gulp-autoprefixer'),
	watching = false,
	server = tinylr(),
	files = {
		dev: {
			sass: './assets/scss/*.scss',
			css: './assets/css/*.css',
			js: {
				custom: './assets/js/*.js',
				lib: './assets/js/lib/*.js',
				theme: './assets/js/**/*.js'
			},
			img: './assets/img/*'
		},
		dist: {
			css: './assets/dist/*.css',
			js: './assets/dist/*.js'
		}
	},
	paths = {
		dev: {
			sass: './assets/scss/',
			css: './assets/css/',
			js: './assets/js/',
			img: './assets/img/'
		},
		dist: {
			css: './assets/dist/css/',
			js: './assets/dist/js/',
			img: './assets/dist/img/'
		}
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
			'style': 'nested',
			'errLogToConsole': watching
		}).on('error', pluginlog))
		.pipe(prefixer('last 2 versions', '> 5%', 'ie 9'))
		// .pipe(csscss())
		.pipe(gulp.dest(paths.dev.css))
		.pipe(liveReload(server));
});


gulp.task('devJs', function() {
	return gulp.src(files.dev.js.custom)
		.pipe(jsHint())
		.pipe(jsHint.reporter('default'));
});

gulp.task('buildImgs', function() {
	gulp.src(files.dev.img)
		.pipe(
			filesCached(
				compressImgs({
					optimizationLevel: 7,
					progressive: true,
					interlaced: true
				})
			)
		)
		.pipe(gulp.dest(paths.dist.img));
});

gulp.task('buildCss', function() {
	gulp.src(files.dev.css)
		.pipe(joinFiles('all.min.css'))
		.pipe(cssMinify())
		.pipe(gulp.dest(paths.dist.css));
});

gulp.task('buildJs', function() {
	gulp.src(files.dev.js.theme)
		.pipe(joinFiles('all.min.js'))
		// .pipe(stripDebug())
		.pipe(jsMinify())
		.pipe(gulp.dest(paths.dist.js));
});

gulp.task('watching', function() {
	watching = true;
});

// Development task
gulp.task('watch', ['watching', 'buildImgs'], function() {
	// LiveReload server listening
	server.listen(35729, function(err) {
		if (err) {
			return console.log(err);
		}

		// Processing
		gulp.watch(files.dev.sass, ['devCss']);
		gulp.watch(files.dev.js.custom, ['devJs']);
	});
});

// Production task
gulp.task('build', ['buildCss','buildJs']);

// Default task
gulp.task('default', ['watch']);

