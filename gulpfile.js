var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');
var fs = require('fs');

var themePath="./";

// fetch command line arguments
const arg = (argList => {
  var arg = {}, a, opt, thisOpt, curOpt;
  for (a = 0; a < argList.length; a++) {
    thisOpt = argList[a].trim();
    opt = thisOpt.replace(/^\-+/, '');

    if (opt === thisOpt) {
      // argument value
      if (curOpt) arg[curOpt] = opt;
      curOpt = null;

    }
    else {
      // argument name
      curOpt = opt;
      arg[curOpt] = true;
    }
  }

  return arg;

})(process.argv);


gulp.task('browser-sync', function() {
  browserSync({
    // Change your port and site location here
    proxy: "https://ws-starter.local"
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('images', function(){
  gulp.src('src/images/**/*', {cwd: themePath})
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest(themePath+'images/'));
});

gulp.task('styles', function(){
  gulp.src(['src/styles/**/*.scss'], {cwd: themePath})
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(sass())
    .pipe(autoprefixer('last 2 versions'))
    .pipe(gulp.dest(themePath))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('scripts', function(){
  return gulp.src('src/scripts/**/*.js', {cwd: themePath})  //get these
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(concat('./main.js')) //put it here
    .pipe(gulp.dest(themePath+'scripts/')) //or here?
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(themePath+'scripts/'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('default', ['browser-sync', 'styles', 'scripts'], function(){
  gulp.watch(themePath+"src/styles/**/*.scss", ['styles']);
  gulp.watch(themePath+"src/scripts/**/*.js", ['scripts']);
  gulp.watch(themePath+"src/images/**/*", ['images']);
  gulp.watch(themePath+"*.html", ['bs-reload']);
  gulp.watch(themePath+"*.php", ['bs-reload']);
});
