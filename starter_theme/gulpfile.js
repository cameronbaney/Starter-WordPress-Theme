var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    imagemin = require('gulp-imagemin'),
    clean = require('gulp-clean'),
    cache = require('gulp-cache'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    pngcrush = require('imagemin-pngcrush');

// CSS
gulp.task('styles', function() {
  return gulp.src('src/css/style.scss')
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 6', 'ie 9', 'ios 6', 'android 4'))
    .pipe(gulp.dest('css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('css'))
    .pipe(minifycss())
    .pipe(gulp.dest('css'))
    .pipe(notify({ message: 'Styles task complete' }));
});

// JS - custom scripts
gulp.task('scripts', function() {
  return gulp.src('src/js/scripts.js')
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// JS - plugins
gulp.task('scripts-plugin', function() {
  return gulp.src('src/js/plugins/*.js')
    .pipe(concat('plugins.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify({ message: 'Plugins task complete' }));
});

// Images
gulp.task('images', function() {
  return gulp.src('src/img/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false, cleanupIDs: true}]
    }))
    .pipe(gulp.dest('img'))
    .pipe(notify({ message: 'Images task complete' }));
});

// Clean dist folder
gulp.task('clean', function() {
  return gulp.src(['css', 'js', 'img'], {read: false})
    .pipe(clean());
});

// Copy files to dist
gulp.task('copyTask', function() {
  // JS library
  gulp.src('src/js/lib/**/*')
    .pipe(gulp.dest('js/lib'));
});

// Default Tasks
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'scripts-plugin', 'images');
});

// Watch tasks
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('src/css/**/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('src/js/scripts.js', ['scripts']);

  // Watch plugin .js files
  gulp.watch('src/js/plugins/*.js', ['scripts-plugin']);

  // Watch image files
  gulp.watch('src/img/**/*', ['images']);
});