var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var browserSync = require('browser-sync').create();
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');



// compile sass

gulp.task('sass', function(){
  return gulp.src('assets/sass/**/*.scss') // grabs all .scss files
  .pipe(sass().on('error', sass.logError)) // Converts Sass to CSS with gulp-sass
  .pipe(minifyCSS({
    keepSpecialComments: 1
  }))
  .pipe(gulp.dest('./'))
  .pipe(browserSync.reload({
    stream: true
  }))
});

gulp.task('scripts', function(){
  return gulp.src('assets/js/**/*.js')
    .pipe(concat('app.js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js/min'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

// watch sass files for changes

gulp.task('watch', function() {
  gulp.watch('assets/sass/**/*.scss', ['sass']);
  gulp.watch('assets/js/**/*.js', ['scripts'])
})

// live reload with browsersync

gulp.task('browserSync', function() {
  browserSync.init({
    proxy: "http://vrdg.dev/" // makes a proxy for localhost
  })
})


// combine watch and browsersync so only have to type gulp watch
gulp.task('watch', ['browserSync'], function(){
  gulp.watch('assets/sass/**/*.scss', ['sass']);
  gulp.watch('assets/js/**/*.js', ['scripts']);
  gulp.watch('./*.php', browserSync.reload);
  // Other watchers
})
