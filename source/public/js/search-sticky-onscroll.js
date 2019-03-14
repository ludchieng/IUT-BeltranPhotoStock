window.onscroll = function() {f()};

var topOffset = $("#search-bar")[0].offsetTop - 50;
var height = $("#search-bar")[0].clientHeight;

var defaultWidth = $("#search-content")[0].style.width;
var defaultMaxWidth = $("#search-content")[0].style.maxWidth;
var defaultHeight = $("#search")[0].clientHeight;

function f() {
  if (window.pageYOffset > topOffset) {
    $("#search-bar")[0].classList.add("sticky");
    $("#search-content")[0].style.width = "100%";
    $("#search-content")[0].style.maxWidth = "100%";
    $("#search")[0].style.height = defaultHeight+"px";
  } else {
    $("#search-bar")[0].classList.remove("sticky");
    $("#search-content")[0].style.width = defaultWidth;
    $("#search-content")[0].style.maxWidth = defaultMaxWidth;
  }
}
