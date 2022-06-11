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
import zip from "gulp-zip";
import replace from "gulp-replace";
import info from "./package.json";

const server = browserSync.create();
const PRODUCTION = yargs.argv.prod;

// const imagemin = require("gulp-imagemin");

const paths = {
  styles: {
    src: [
      "./src/assets/scss/bundle.scss",
      "./src/assets/scss/admin.scss",
      "./src/assets/scss/editor.scss",
    ],
    dest: "dist/asset/css",
  },
  images: {
    src: ["./src/assets/images/**/*.{jpg,jpeg,png,svg,gif}"],
    dest: "dist/asset/images",
  },
  scripts: {
    src: [
      "./src/assets/js/bundle.js",
      "./src/assets/js/admin.js",
      "./src/assets/js/customize-preview.js",
    ],
    dest: "dist/asset/js",
  },
  plugins: {
    src: ["../../plugins/pre-post-type/**/*"],
    dest: ["lib/plugins"],
  },
  other: {
    src: [
      "src/assets/{js, scss}/**/*",
      "!src/assets/{images, js, scss}",
      "!src/assets/{images,js,scss}/**/*",
    ],
    dest: "dist/asset",
  },
  package: {
    src: [
      "**/*",
      "!node_modules{,/**}",
      "!packaged{,/**}",
      "!src{,/**}",
      "!.babelrc",
      "!.gitignore",
      "!gulpfile.babel.js",
      "!package.json",
      "!package-lock.json",
    ],
    dest: "yourtheme",
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
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(server.stream());
};

export const copy = () => {
  return gulp.src(paths.other.src).pipe(gulp.dest(paths.other.dest));
};

export const copyPlugins = () => {
  return gulp.src(paths.plugins.src).pipe(gulp.dest(paths.plugins.dest));
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

export const compress = () => {
  return (
    gulp
      .src(paths.package.src)
      // .pipe(
      //   gulpIf((file) => file.relative.split(".").pop() !== "zip"),
      //   replace("_themename", info.name)
      // )
      .pipe(zip(`${info.name}.zip`))
      .pipe(gulp.dest(paths.package.dest))
  );
};

export const compressPlugins = () => {
  return gulp
    .src(paths.plugins.src)
    .pipe(zip(`${"pre-post-types"}.zip`))
    .pipe(gulp.dest(paths.plugins.dest));
};

export const build = gulp.series(
  clean,
  gulp.parallel(styles, scripts, copy),
  copyPlugins
);

export const dev = gulp.series(
  clean,
  gulp.parallel(styles, scripts, copy),
  serve,
  watch
);

export const bundle = gulp.series(build, compress);

export default bundle;

// export const images = () => {
//   return gulp
//     .src(paths.images.src)
//     .pipe(gulpIf(PRODUCTION, imagemin()))
//     .pipe(paths.imagesgulp.dest);
// };
