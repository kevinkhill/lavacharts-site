var $ = require('jquery')(window);
global.jQuery = require("jquery");
var bootstrap = require('bootstrap');

$(function() {

  $('body').scrollspy({
    target: '.lava-sidebar',
    offset: 550
  });

  $("#sidebar").affix({
    offset: {
      top: 550
    }
  });

  //require('./prettify.run.min');
});
