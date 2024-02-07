var image = document.getElementsByClassName('simple-parallax');
new simpleParallax(image);

jQuery(document).ready(function(){
	
	/* Clickable Divs */
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
	
});