$(document).ready(function(){
$(".ttl").focus(function(){
   $(".title").show(100);
   $(".qes").hide(100);
   $(".tag").hide(100);
});
$(".wmd-input").focus(function(){
  $(".title").hide(100);
  $(".qes").show(100);
  $(".tag").hide(100);
});
$(".tg").focus(function(){
  $(".title").hide(100);
  $(".qes").hide(100);
  $(".tag").show(100);
});

});