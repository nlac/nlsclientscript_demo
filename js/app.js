//apply bootstrap tooltip for all tt-classed elements
$(".tt").each(function(){
	var $el = $(this);
	if (!$el.attr("title"))
		$el.attr("title", $el.filter("input")[0] ? $el.val() : $el.html());

	if ($el.attr("title"))
		$el.tooltip();
});