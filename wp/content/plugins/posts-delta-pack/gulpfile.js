// Load gulp plugins with 'require' function of nodejs
const gulp      = require('gulp');
const plumber   = require('gulp-plumber');
const gutil     = require('gulp-util');
const uglify    = require('gulp-uglify');
const concat    = require('gulp-concat');
const rename    = require('gulp-rename');
const minifyCSS = require('gulp-minify-css');
const less      = require('gulp-less');
const path      = require('path');
const babel     = require('gulp-babel');

// Handle less error
var onError = function (err) {
  gutil.beep();
  console.log(err);
};

// Path configs
var css_files = 'assets/css/*.css', // .css files
css_path      = 'assets/css', // .css path
js_files      = 'assets/js/**/*.js', // .js files
less_file     = 'assets/less/style.less', // .less files
less_path     = 'assets/less/*.less',
dist_path     = 'assets/dist';
dist_js_file  = 'assets/dist/concat.min.js';

//Extension config
var extension = 'html';


/***** Functions for tasks *****/
function js() {
  return gulp.src(js_files)
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(concat('dist'))
    .pipe(rename('concat.min.js'))
    .pipe(babel())
    .pipe(uglify())
    .pipe(gulp.dest(dist_path));
}

function runBabel() {
  return gulp.src(dist_js_file)
    .pipe(babel({
      presets: ['es2015']
    }))
    .pipe(gulp.dest('assets/dist/app.min.js'));
}

function css() {
  return gulp.src(css_files)
    .pipe(concat('dist'))
    .pipe(rename('all.min.css'))
    .pipe(minifyCSS({keepBreaks:false, keepSpecialComments: false}))
    .pipe(gulp.dest(dist_path));
}

function lessTask(err) {
  return gulp.src(less_file)
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(less({ paths: [ path.join(__dirname, 'less', 'includes') ] }))
    .pipe(gulp.dest(css_path));
}

// The 'js' task
gulp.task('js', function() {
  return js();
});

// The 'css' task
gulp.task('css', function(){
  return css();
});

// The 'less' task
gulp.task('less', function(){
  return lessTask();
});


// The 'default' task.
gulp.task('default', function() {
  gulp.watch(less_path, function() {
    return lessTask();
  });

  gulp.watch(css_files, function() {
    console.log('CSS task completed!');
    return css();
  });

  gulp.watch(js_files, function() {
    console.log('JS task completed!');
    return js();
  });
});
