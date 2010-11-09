function actualize(){
  $('#task-timeago').text(parseInt($('#task-timeago').text()) + 1);
  var t=setTimeout("actualize()",60000);
}
$().ready(function(){
  actualize();
});

