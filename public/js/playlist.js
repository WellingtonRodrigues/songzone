$(function() {
	$('#playlist-items').sortable({
		  containment: "parent",
		  cursor: "move",
		  opacity: 0.8,
		  revert: true,
		  tolerance: "pointer"
	});
});
