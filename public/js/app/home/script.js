/******/ (() => { // webpackBootstrap
/*!*****************************************!*\
  !*** ./resources/js/app/home/script.js ***!
  \*****************************************/
document.addEventListener('DOMContentLoaded', function () {
  $('#recogida').flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: false
  });
  $('#devolucion').flatpickr({
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    time_24hr: false
  });
});
/******/ })()
;