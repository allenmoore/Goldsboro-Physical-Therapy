import gulp from 'gulp';
import requireDir from 'require-dir';

requireDir('./gulp-tasks');

gulp.task('clean-files', gulp.series('clean', (done) => {
  done();
}))

/**
 * Gulp task to run all JavaScript processes in a sequenctial order.
 *
 * @author  Allen Moore
 * @param   {String}   'js' the task name.
 * @param   {Function} cb   the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('css', gulp.series('postcss', function(done) {
  done();
}));

/**
 * Gulp task to run all minification processes in a sequencial order.
 *
 * @author  Allen Moore
 * @param   {String}   'minify' the task name.
 * @param   {Function} cb       the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('minify', gulp.series(['cssnano'], function(done) {
  done();
}));

gulp.task('watch', () => {
  gulp.watch('./src/css/**/*.css', gulp.series(['clean-files', 'css', 'minify']));
})

/**
 * Gulp task to run the default build processes in a sequenctial order.
 *
 * @author  Allen Moore
 * @param   {String}   'default' the task name.
 * @param   {Function} cb        the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('default', gulp.series(['clean-files', 'css', 'minify'], function(done) {
  done();
}));
