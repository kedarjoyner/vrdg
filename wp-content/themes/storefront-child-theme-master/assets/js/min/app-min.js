$(document).ready(function(){$("#toggle").click(function(){$(this).toggleClass("active"),$(this).hasClass("active")?$(".custom-menu-items").slideDown():$(".custom-menu-items").slideUp("fast")}),$(".custom-menu-items > li").click(function(){$(this).children("ul.sub-menu").slideToggle()})});