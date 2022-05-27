import gulp from "gulp";
const sass = require("gulp-sass")(require("sass"));

export const styles = (done) => {
  return gulp
    .src("./src/assets/scss/bundle.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("dist/asset/css"));
};
