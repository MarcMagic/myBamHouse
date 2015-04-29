<script type="text/javascript" >
$(function() {
$(".more").click(function() {
var element = $(this);
var headline = element.attr("id");
$("#morebutton").html('<img src="ajax-loader.gif" />');

$.ajax({
type: "POST",
url: "more_ajax.php",
data: "lastmsg="+ headline,
cache: false,
success: function(html){

$("#more_updates").append(html);
$(".more").remove();

}
});
return false;
});
});
</script>
