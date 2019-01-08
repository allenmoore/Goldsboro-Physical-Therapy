import chalk from 'chalk';
import gulp from 'gulp';
import livereload from 'gulp-livereload';

const log = console.log,
  nodeDir = './node_modules',
  jsOpts = {
    srcDest: './dist/js',
    vendorDest: './dist/js/vendor',
    vendorFiles: [
      `${nodeDir}/fg-loadcss/dist/**/*.js`
    ]
};

/**
 * Function to copy vendor files to the dist folder.
 *
 * @param {Object} atts an Object of file properties.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('copy-vendor', () => {
  log(chalk.green('--- Copying JS Vendor Files ---'));

  return gulp.src(jsOpts.vendorFiles)
    .pipe(gulp.dest(jsOpts.vendorDest))
    .pipe(livereload());
});

