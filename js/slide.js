<!-- Slide2 -->
	var u;
	function showSlide2() {
		var slide2 = document.getElementsByClassName("slide2");
		for(var i=0; i<slide2.length; i++) {
			slide2[i].style.display = "none";
		}
		slide2[u].style.display = "block";
		u++;
		if(u > slide2.length-1) {
			u = 0;
		}
		setTimeout(showSlide2, 3000);
	}
	showSlide2(u = 0);
	
<!-- Lấy slide sau -->
	function nextSlide() {
		var slide2 = document.getElementsByClassName("slide2");
		for(var i=0; i<slide2.length; i++) {
			slide2[i].style.display = "none";
		}
		u++;
		if(u > slide2.length-1) u = 0;
		slide2[u].style.display = "block";
	}
	
<!-- Lấy slide trước -->
	function prevSlide() {
		var slide2 = document.getElementsByClassName("slide2");
		for(var i=0; i<slide2.length; i++) {
			slide2[i].style.display = "none";
		}
		u--;
		if(u < 0) u = slide2.length-1;
		slide2[u].style.display = "block";
	}
	
	
