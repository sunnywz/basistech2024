jQuery(document).ready(function(){
	
	clickableDiv();
	
});

document.addEventListener('facetwp-loaded', function() {
	
	clickableDiv();
	
});

/* Clickable Divs */
function clickableDiv() {
	jQuery(".clickable-div").click(function(e) {
		var $location = jQuery(this).find("a").attr("href");
		var $target = jQuery(this).find("a").attr("target");
		if($location) {
			if(e.metaKey || $target == '_blank') {
				window.open($location, '_blank');
			}
			else {
				window.location = $location;
			}
		    return false;
	    }
	});
}