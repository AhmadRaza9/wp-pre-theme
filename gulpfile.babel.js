// const gulp = require("gulp");

// gulp.task("default", defaultTask);

// function defaultTask(done) {
//   console.log("hey");
//   done();
// }

// gulp.task("hello", function (done) {
//   console.log("Hello!");
//   done();
// });

import gulp from "gulp";

export const hello = (done) => {
  console.log("hello");
  done();
};

export default hello;
