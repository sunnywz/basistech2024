/* simple parallax init for graphic header */
/*
var image = document.getElementsByClassName('parallax');
new simpleParallax(image, {
	scale: 1.75,
	transition: 'cubic-bezier(0,0,0,1)'
});
*/

const parallaxElements = [...document.getElementsByClassName('parallax')];
const parallax = function(img) {
    const speed = 2;
    let pos = '-' + (window.pageYOffset / speed) + "px";
    img.style.backgroundPosition = `center ${ pos }`;
}
window.addEventListener('scroll', function(e) {
    parallaxElements.forEach( (img) => {
        parallax(img);
    });
});

function animate_all_svgs() {
	jQuery('.animatesvg').each(function (i) {
	    if(!jQuery(this).hasClass('animation-complete')) {
			var top_of_object = jQuery(this).position().top;
	        var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
	        if (bottom_of_window > (top_of_object + 500)) {
		        jQuery(this).addClass('animation-visible');
	            var temp = jQuery(this).drawsvg({
		            duration :	2500,
		            stagger :	1000
	            });
	            temp.drawsvg('animate');
	            jQuery(this).addClass('animation-complete');
	        }
        }
    });
}

/* on document ready */
jQuery(document).ready(function(){
	
	/* custom function to check for clickable divs (cards mainly) */
	clickableDiv();
	
	/* wow animations throughout the site */
	var wow = new WOW();
	wow.init();
	
	jQuery('.menu-anchor-link').on('click', function(e) {
		jQuery('.menu-anchor-link').removeClass('clicked');
		jQuery(this).addClass('clicked');
	});
	
	shuffle();
	
});

const cards = document.querySelectorAll(".shuffle-team .team-item");

function shuffle() {
	cards.forEach((card) => {
		card.style.order = Math.floor(Math.random() * 100);
	});
}

/* on window scroll */
jQuery(window).on('scroll', function(e) {
	/* yellow circle animations */
	var windowTop = jQuery(window).scrollTop();
	if(jQuery('.yellow-circle').length) {
		var elementTop = jQuery('.yellow-circle').offset(); // where on the page is the intro lines
		var totalScroll = jQuery('.yellow-circle').height(); // how tall are the intro lines
		var startAnimationPosition = elementTop.top; // when should the animation begin
		if(windowTop > startAnimationPosition) { // have we hit the beginning yet
			var percentScrolled = (windowTop - elementTop.top) / totalScroll; // how far into the animatable area are we
		
			percentScrolled = 0 + (percentScrolled * 150); // arbitrary function of that percent, to get a usable valuable

			var newPosition = percentScrolled - 1300;
			
			newPosition = newPosition + 'px'; // convert to something that we can use

			jQuery('.yellow-circle').css({ 'left': newPosition } ); // assign negative margin top to bump it up with that function
		}
	}
	
	animate_all_svgs();
});

/* on facet loaded for Load More buttons */
/*
document.addEventListener('facetwp-loaded', function() {
	
	clickableDiv();
	
});
*/

/* Clickable Divs function called multiple times */
function clickableDiv() {
	jQuery(".clickable-div").on('click', function(e) {
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