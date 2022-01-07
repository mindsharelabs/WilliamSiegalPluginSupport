const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));
const sourcemaps = require('gulp-sourcemaps');
const del = require('del');


gulp.task('block-styles', () => {
    return gulp.src('scss/block-styles.scss')
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'compressed'//nested, expanded, compact, compressed
      }).on('error', sass.logError))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./inc/css/'))
});



gulp.task('clean', () => {
    return del([
        'inc/css/block-styles.css',
    ]);
});

gulp.task('watch', () => {
  gulp.watch('scss/*.scss', (done) => {
    gulp.series(['block-styles'])(done);
  });
});

gulp.task('default', gulp.series(['clean','block-styles', 'watch']));
