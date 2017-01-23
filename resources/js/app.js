var $ = jQuery = require('jquery');
var bootstrap = require('bootstrap');


jQuery(function ($) {
  $('#page-content-wrapper').scrollspy({
    target: '#sidebar-wrapper',
    offset: 100
  });

  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $("ul.shields li a div").each(function (i, e) {
    var img = new Image();

    img.onload = function() { e.appendChild(img); };
    img.src = "https://img.shields.io/" + $(e).data('src');
  });
});
