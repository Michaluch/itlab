var gulp = require('gulp');

var less = require('gulp-less'),
	minifyCSS = require('gulp-minify-css'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify');

var vendor = 'node_modules/';

var css_compiled = '../css/';
var js_compiled = '../js/';


gulp.task('compileCSS', function () {
	gulp.src([
    	vendor + 'bootstrap3/less/bootstrap.less',
		'less/style.less',
    ])
    	.pipe(less())
    	.pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9'))
    	.pipe(concat('style.css'))
    	.pipe(minifyCSS())
    	.pipe(gulp.dest(css_compiled));
});

gulp.task('compileJS', function() {
	gulp.src('js/*.js')
    	.pipe(concat('main.js'))
    	.pipe(uglify())
    	.pipe(gulp.dest(js_compiled));
});

gulp.task('default', ['compileCSS', 'compileJS']);