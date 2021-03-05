const gulp = require('gulp'),
	del = require('del'),
	plumber = require('gulp-plumber'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	dependents = require('gulp-dependents'),
	purgecss = require('gulp-purgecss'),
	minifyCss = require('gulp-clean-css'),
	babel = require('gulp-babel'),
	webpack = require('webpack-stream'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	browserSync = require('browser-sync')

src_folder = './assets/'
dest = './'

gulp.task('style', () => {
	return gulp
		.src(src_folder + 'sass/style.scss', { since: gulp.lastRun('style') })
		.pipe(plumber())
		.pipe(dependents())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest(dest))
		.pipe(browserSync.stream())
})

gulp.task('editor', () => {
	return gulp
		.src(src_folder + 'sass/style-editor.scss', {
			since: gulp.lastRun('editor')
		})
		.pipe(plumber())
		.pipe(dependents())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest(dest))
		.pipe(browserSync.stream())
})

gulp.task('purgecss', () => {
	return gulp
		.src('./style.css')
		.pipe(
			purgecss({
				content: ['./**/*.php']
			})
		)
		.pipe(gulp.dest(dest))
})

gulp.task('js', () => {
	return gulp
		.src(src_folder + 'js/**/*.js', { since: gulp.lastRun('js') })
		.pipe(plumber())
		.pipe(
			webpack({
				mode: 'production'
			})
		)
		.pipe(
			babel({
				presets: ['@babel/env']
			})
		)
		.pipe(concat('app.js'))
		.pipe(gulp.dest(src_folder + 'js'))
		.pipe(browserSync.stream())
})

gulp.task('uglify', () => {
	return gulp
		.src(src_folder + 'js/app.js', { since: gulp.lastRun('uglify') })
		.pipe(uglify())
		.pipe(gulp.dest(src_folder + 'js'))
})

gulp.task('minify', () => {
	return gulp
		.src('./style.css', { since: gulp.lastRun('minify') })
		.pipe(minifyCss())
		.pipe(gulp.dest(dest))
})

gulp.task('dev', gulp.series('style', 'editor'))
gulp.task('build', gulp.series('uglify', 'minify'))

gulp.task('serve', () => {
	return browserSync.init({
		proxy: 'http://localhost:10003/',
		notify: true
	})
})

gulp.task('watch', () => {
	const watch = [
		src_folder + 'sass/**/*.scss',
		src_folder + 'js/**/*.js',
		dest + '**/*.php'
	]
	gulp.watch(watch, gulp.series('dev')).on('change', browserSync.reload)
})

gulp.task('start', gulp.series('dev', gulp.parallel('serve', 'watch')))
