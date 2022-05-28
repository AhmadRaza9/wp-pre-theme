import gulp from "gulp";
import yargs from "yargs";
const sass = require("gulp-sass")(require("sass"));
import cleanCss from "gulp-clean-css";
import gulpIf from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import del from "del";
const PRODUCTION = yargs.argv.prod;

// const imagemin = require("gulp-imagemin");

const paths = {
  styles: {
    src: ["./src/assets/scss/bundle.scss", "./src/assets/scss/admin.scss"],
    dest: "dist/asset/css",
  },
  images: {
    src: ["./src/assets/images/**/*.{jpg,jpeg,png,svg,gif}"],
    dest: "dist/asset/images",
  },
  other: {
    src: [
      "src/assets/**/*",
      "!src/assets/{images, js, scss}",
      "!src/assets/{images,js,scss}/**/*",
    ],
    dest: "dist/asset",
  },
};

export const clean = (done) => {
  return del(["dist"]);
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

export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const build = gulp.series(clean, styles, copy);

// export const images = () => {
//   return gulp
//     .src(paths.images.src)
//     .pipe(gulpIf(PRODUCTION, imagemin()))
//     .pipe(paths.imagesgulp.dest);
// };
