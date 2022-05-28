import gulp from "gulp";

import yargs from "yargs";

const sass = require("gulp-sass")(require("sass"));

import cleanCss from "gulp-clean-css";

import gulpIf from "gulp-if";

import sourcemaps from "gulp-sourcemaps";

const PRODUCTION = yargs.argv.prod;

export const styles = (done) => {
  return gulp
    .src("./src/assets/scss/bundle.scss")
    .pipe(gulpIf(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on("error", sass.logError))
    .pipe(gulpIf(PRODUCTION, cleanCss({ compatibility: "ie8" })))
    .pipe(gulpIf(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest("dist/asset/css"));
};
