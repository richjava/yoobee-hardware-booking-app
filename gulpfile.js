var gulp = require('gulp');
//var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var useref = require('gulp-useref');
var uglify = require('gulp-uglify');
var gulpIf = require('gulp-if');
var cssnano = require('gulp-cssnano');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var del = require('del');
var runSequence = require('run-sequence');
var autoprefixer = require('gulp-autoprefixer');
var wiredep = require('wiredep').stream;


/*convert all sass/scss files to css*/
gulp.task('sass', function(){
    return gulp.src('app/scss/**/*.+(scss|sass)')
        .pipe(sass()) // Converts Sass to CSS with gulp-sass
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        })) //Prefix CSS
        .pipe(gulp.dest('app/css'))
        //.pipe(browserSync.stream());
});

/*browsersync to refresh the browser everytime html,css and js saved*/
//gulp.task('browserSync', function() {
//    browserSync.init({
//        server: "./app"
//    });
//});

/*minify png, jpg, gif, svg*/
gulp.task('images', function(){
    return gulp.src('app/images/**/*.+(png|jpg|jpeg|gif|svg)')
        // Caching images that ran through imagemin
        .pipe(cache(imagemin({
            interlaced: true
        })))
        .pipe(gulp.dest('dist/images'))
});

/*cleaning/deleting the files that are not needed*/
gulp.task('clean:dist', function() {
    return del.sync('dist');
})

/*just copy all the font into dest*/
gulp.task('fonts', function() {
    return gulp.src('app/fonts/**/*')
        .pipe(gulp.dest('dist/fonts'))
})

/*Gulp-useref concatenates any number of CSS and JavaScript files into a single file  from "<!--build:" to "<!--endbuild-->"*/
gulp.task('useref', function(){
    return gulp.src('app/*.html')
        .pipe(useref())
        // Minifies only if it's a JavaScript file
        .pipe(gulpIf('*.js', uglify()))
        // Minifies only if it's a CSS file
        .pipe(gulpIf('*.css', cssnano()))
        .pipe(gulp.dest('dist'))
});

/*ensures that clean:dist runs first, followed by all the other tasks*/
gulp.task('build', function (callback) {
    runSequence('clean:dist', ['sass', 'useref', 'images', 'fonts'], callback)
})


/*gulp serve runs the sass and browsersync + more from above*/
/*named the tasj default so it can be run by simply calling GULP*/
gulp.task('default' , ['sass'] , function(){
    gulp.watch('app/scss/**/*.+(sass|scss)', ['sass']);
    //gulp.watch("app/*.html").on('change', browserSync.reload);
    //gulp.watch('app/js/**/*.js', browserSync.reload);
    // Other watchers
});

/*Wires Bower dependencies to your source code.*/
gulp.task('wiredep', function () {
    gulp.src('application/views/home.php')
        .pipe(wiredep({
            optional: 'configuration',
            goes: 'here'
        }))
        .pipe(gulp.dest('./dest'));
});