var gulp = require('gulp');
var sass = require('gulp-sass');


// compile sass

gulp.task('sass', function(){
  return gulp.src('assets/sass/style.scss')
  .pipe(sass()) // Converts Sass to CSS with gulp-sass
  .pipe(gulp.dest('./'))
});
