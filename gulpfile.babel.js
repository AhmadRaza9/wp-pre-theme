import gulp from "gulp";
import yargs from "yargs";
const sass = require("gulp-sass")(require("sass"));
import cleanCss from "gulp-clean-css";
import gulpIf from "gulp-if";
import sourcemaps from "gulp-sourcemaps";
import del from "del";
// import webpack from "webpack-stream";
import uglify from "gulp-uglify";
import browserSync from "browser-sync";

const server = browserSync.create();
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
  scripts: {
    src: "./src/assets/js/**/*",
    dest: "dist/asset/js",
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

export const serve = (done) => {
  server.init({
    proxy: "http://wp-pre-theme.test/",
  });
  done();
};

export const reload = (done) => {
  server.reload();
  done();
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

export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const watch = () => {
  gulp.watch("src/assets/scss/**/*.scss", gulp.series(styles, reload));
  gulp.watch("src/assets/js/**/*.js", gulp.series(scripts, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
};

// export const scripts = () => {
//   return gulp
//     .src(paths.scripts.src)
//     .pipe(
//       webpack({
//         module: {
//           loaders: [
//             {
//               test: /\.js$/,
//               use: {
//                 loader: "babel-loader",
//                 options: {
//                   presets: ["babel-preset-env"],
//                 },
//               },
//             },
//           ],
//         },
//         output: {
//           filename: "bundle.js",
//         },
//           externals: {
//              filename: '[name].js'
//            },
//           devtool: 'inline-source-map'
//       })
//     )
//     .pipe(gulp.dest(paths.scripts.dest));
// };

export const scripts = (done) => {
  gulp
    .src(paths.scripts.src)
    .pipe(gulpIf(PRODUCTION, sourcemaps.init()))
    .pipe(uglify())
    .pipe(gulpIf(PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.scripts.dest));
  done();
};

export const build = gulp.series(clean, gulp.parallel(styles, scripts, copy));

export const dev = gulp.series(
  clean,
  gulp.parallel(styles, scripts, copy),
  serve,
  watch
);
export default dev;

// export const images = () => {
//   return gulp
//     .src(paths.images.src)
//     .pipe(gulpIf(PRODUCTION, imagemin()))
//     .pipe(paths.imagesgulp.dest);
// };
