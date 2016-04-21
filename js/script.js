window.onload = function() {
	var scrollImage = document.getElementById('scroll-image'); 
	setInterval(function() {moveImage(scrollImage) } , 50);
}

function moveImage(scrollImage) {
	var newMargin = Number(scrollImage.style.marginBottom.slice(0,-2)) + -0.5;
	if(newMargin <= -10) newMargin = 0;
	scrollImage.style.marginBottom = newMargin + "px";
}