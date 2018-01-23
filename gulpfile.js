'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();



gulp.task('sass', function () {
    return gulp.src('./sass/main.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(gulp.dest('./web/css'));
});


gulp.task('serve', ['sass'], function() {
    browserSync.init({
        proxy: "localhost/io/web/",
        port: 80
    });
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch("web/css/main.css").on('change', browserSync.reload);
});



gulp.task('default', ['serve']);