var slideIndex = 0;

carouse1();


function carouse1() {
	var i;
	var x = document.getElementsByClassName("mySlides");

	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > x.length) {slideIndex = 1}
	x[slideIndex-1].style.display = "block";
	setTimeout(carouse1, 2000);//5 seconds
}