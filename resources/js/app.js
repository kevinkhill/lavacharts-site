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
});
