/**
 * @file
 * Defines gulp tasks to be run by Gulp task runner.
 */

/* eslint-env node */

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('init', function () {
    'use strict';
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
  });

// Watch task //
gulp.task('watch', function () {
    'use strict';
    gulp.watch('sass/**/*.scss', ['init']);
  });


// Add Support for Browsersync + watching scss/html files //
gulp.task('browsersync', ['sass'], function () {
    'use strict';
    browserSync.init({
      proxy: "yoursite.dev",
      reloadDelay: 1000
    });

  gulp.task('fonts', function() {
      return gulp.src([
                      'node_modules/bootstrap-sass/assets/fonts/bootstrap/*.*'])
              .pipe(gulp.dest('fonts/'));
    });

    gulp.watch("sass/**/*.scss", ['sass']).on('change', browserSync.reload);
  });

// Compile sass into CSS & auto-inject into browsers //
gulp.task('sass', function () {
    'use strict';
    return gulp.src("sass/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("css"))
        .pipe(browserSync.stream());
  });

gulp.task('default', ['sass', 'fonts'], function () {
    gulp.watch('sass/**/*.scss', ['init']);
  });
