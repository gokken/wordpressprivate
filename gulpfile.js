'use stcict';

var gulp          = require("gulp");
var browserSync   = require('browser-sync').create();
var reload        = browserSync.reload;

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost:8000"
  });
});

gulp.task("watch", function () {
    gulp.watch('/wp-content/**/*', reload);
    gulp.watch('/html/wp-content/**/*', reload);
});

gulp.task("default", ["browser-sync", "watch"]);
