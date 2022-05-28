import gulp from "gulp";

import yargs from "yargs";

const sass = require("gulp-sass")(require("sass"));

import cleanCss from "gulp-clean-css";

import gulpIf from "gulp-if";

import sourcemaps from "gulp-sourcemaps";

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: ["./src/assets/scss/bundle.scss", "./src/assets/scss/admin.scss"],
    dest: "dist/asset/css",
  },
};

export const styles = (done) => {
  return gulp
    .src(paths.styles.src)
    .pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpIf(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest));
};

export const watch = () => {
  return gulp.watch("src/assets/scss/**/*.scss", styles);
};
