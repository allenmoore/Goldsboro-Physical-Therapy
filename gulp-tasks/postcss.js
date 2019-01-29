import atImport from 'postcss-import';
import chalk from 'chalk';
import cssnano from 'gulp-cssnano';
import gulp from 'gulp';
import livereload from 'gulp-livereload';
import mixins from 'postcss-mixins';
import pxtorem from 'postcss-pxtorem';
import postcss from 'gulp-postcss';
import presetEnv from 'postcss-preset-env';
import rename from 'gulp-rename';
import rgbaFallback from 'postcss-color-rgba-fallback';
import sourcemaps from 'gulp-sourcemaps';
import vars from 'postcss-simple-vars';

const log = console.log;

/**
 * Function to run PostCSS against files in a src directory.
 *
 * @author  Allen Moore
 * @param   {Object}   atts an Object of file properties.
 * @param   {Function} cb   the pipe sequence that gulp should run.
 * @returns {void}
 */
gulp.task('postcss', () => {
  const opts = {
    dest: './dist/css',
    src: [
      './src/css/style.css'
    ]
  };
  log(chalk.redBright('--- Running PostCSS Goodness ---'));

  return gulp.src(opts.src)
    .pipe(sourcemaps.init({loadMaps: true}))
	  .pipe(postcss([
      atImport(),
      mixins(),
      vars(),
      presetEnv({
        stage: 2,
        features: {
          'custom-media-queries': true,
          'custom-properties': true,
          'image-set-function': true,
          'matches-pseudo-class': true,
          'media-query-ranges': true,
          'nesting-rules': true,
          'not-pseudo-class': true
        }
      }),
      pxtorem({
        rootValue: 16,
        unitPrecision: 5,
        propList: ['*'],
        replace: false
      }),
      rgbaFallback()
    ]))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(opts.dest))
    .pipe(livereload());
});

