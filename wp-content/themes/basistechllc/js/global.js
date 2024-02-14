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
		if($location) {
			if(e.metaKey) {
				window.open($location, '_blank');
			}
			else {
				window.location = $location;
			}
		    return false;
	    }
	});
}