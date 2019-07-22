<!-- Lấy thời gian hệ thống -->
		
	function time() {
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();
		var s = date.getSeconds();
		h = checkTime(h);
		s = checkTime(s);
		m = checkTime(m);
		document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
		var t = setTimeout(time, 500);
	}
	function checkTime(t) {
		if(t<10) t = "0" + t;
		return t;
	}
	time();