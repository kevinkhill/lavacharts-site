var $ = jQuery = require('jquery');
var bootstrap = require('bootstrap');

jQuery(function ($) {

  $('body').scrollspy({
    target: '.lava-sidebar',
    offset: 100
  });

  $("#sidebar").affix({
    offset: {
      top: 550
    }
  });

  //require('./prettify.run.min');
});
