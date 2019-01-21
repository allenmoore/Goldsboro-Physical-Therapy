import chalk from 'chalk';
import gulp from 'gulp';
import criticalCSS from 'gulp-penthouse';
import livereload from 'gulp-livereload';

const log = console.log;

/**
 * Function to generate CSS for the critical rendering path.
 *
 * @param {Object} atts an Object of file properties.
 * @param {Function} cb the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('critical-css', () => {
  const opts = {
    dest: './dist/css',
    src: [
      'style.css'
    ]
  };
  log(chalk.cyanBright('--- Running a Critical CSS process ---'));

  return gulp.src(opts.src)
    .pipe(criticalCSS({
      out: 'critical.style.min.css',
      url: 'http://goldsborophysicaltherapy.com/',
      width: 1920,
      height: 1200,
      keepLargerMediaQueries: true,
      blockJSRequests: true,
      timeout: 60000
    }))
    .pipe(gulp.dest(opts.dest))
    .pipe(livereload());
});
