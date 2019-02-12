import gulp from 'gulp';
import livereload from 'gulp-livereload';
import requireDir from 'require-dir';

requireDir('./gulp-tasks');

/**
 * Gulp task to run the Clean process.
 *
 * @param {String} 'js' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('clean-files', gulp.series('clean', (done) => {
  done();
}));

/**
 * Gulp task to run all JavaScript processes in a sequential order.
 *
 * @param {String} 'js' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('css', gulp.series('postcss', (done) => {
  done();
}));

/**
 * Gulp task to run the CriticalCSS process.
 *
 * @param {String} 'css-critical' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('css-critical', gulp.series('critical-css', (done) => {
  done();
}));

/**
 * Gulp task to run all JavaScript processes in a sequential order.
 *
 * @param {String} 'js' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('copy-js', gulp.series(['copy-vendor'], (done) => {
  done();
}));

/**
 * Gulp task to compress all theme images.
 *
 * @param {String} 'imagemin' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('imagemin', gulp.series(['image'], (done) => {
  done();
}))

/**
 * Gulp task to run all minification processes in a sequential order.
 *
 * @param {String} 'minify' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('minify', gulp.series(['cssnano'], (done) => {
  done();
}));

/**
 * Gulp task to run the default build processes in a sequential order.
 *
 * @param {String} 'default' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('default', gulp.series(['clean-files', 'css', 'copy-js', 'imagemin', 'minify']));

/**
 * Gulp task to watch for file changes and run the default build task..
 *
 * @param {String} 'watch' the task name.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('watch', (cb) => {
  livereload.listen({
    start: true,
    host: 'goldsborophysicaltherapy.test'
  });
  gulp.watch('./src/css/**/*.css', gulp.series(['default']));
});
